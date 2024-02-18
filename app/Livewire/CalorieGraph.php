<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CalorieGraph extends Component
{
    public $percent = 0;
    public $totalCalories = 0;
    public $totalCarbonhydrates = 0;
    public $totalFat = 0;
    public $totalProtein = 0;

    public function mount()
    {
        $user = User::findOrFail(Auth::id());
        $today = now()->timezone('Europe/Budapest')->startOfDay();
        $loggedMeals = $user->meals()
                ->with('users')
                ->wherePivot('consumed_at', '>=', $today)
                ->get();
        $loggedSum = $loggedMeals->sum('calories');
        $calorieGoal = $user->calorie_goal;
        $tempPercent = round(($loggedSum / $calorieGoal) * 100);
        if ($tempPercent > 100) {
            $this->percent = 100;
        } else {
            $this->percent = $tempPercent;
        }

        $this->setTotalValues($loggedMeals);
    }

    #[On('percent-calculated')]
    public function refreshPercentage($caloriePercentage)
    {
        $this->percent = $caloriePercentage;
        $user = User::findOrFail(Auth::id());
        $today = now()->timezone('Europe/Budapest')->startOfDay();

        $loggedMeals = $user->meals()
                ->with('users')
                ->wherePivot('consumed_at', '>=', $today)
                ->get();
        $this->setTotalValues($loggedMeals);
    }

    public function setTotalValues($loggedMeals){
        $this->totalCalories = $loggedMeals->sum('calories');
        $this->totalCarbonhydrates = $loggedMeals->sum('carbonhydrates');
        $this->totalFat = $loggedMeals->sum('fats');
        $this->totalProtein = $loggedMeals->sum('protein');
    }

    public function render()
    {
        return view('livewire.calorie-graph');
    }
}
