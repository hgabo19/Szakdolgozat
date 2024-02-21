<?php

namespace App\Livewire;

use App\Models\Meal;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class LoggedFoodList extends Component
{
    public $loggedMealsToday;
    public $totalCalories;
    public $totalCarbonhydrates;
    public $totalFat;
    public $totalProtein;


    public function mount()
    {
        $user = User::findOrFail(Auth::id());
        $today = now()->timezone('Europe/Budapest')->startOfDay();

        $this->loggedMealsToday = $user->meals()
                ->with('users')
                ->wherePivot('consumed_at', '>=', $today)
                ->withPivot('id')
                ->orderByPivot('consumed_at', 'desc')
                ->get();
        $this->setTotalValues();
        $this->calculateCaloriePercentage($user);
    }

    #[On('food-added')]
    public function addFoodsToList()
    {
        if(Auth::check())
        {
            $user = User::findOrFail(Auth::id());
            $today = now()->timezone('Europe/Budapest')->startOfDay();
            $this->loggedMealsToday = collect([]);
            $this->loggedMealsToday = $user->meals()
                ->with('users')
                ->wherePivot('consumed_at', '>=', $today)
                ->withPivot('id')
                ->orderBy('consumed_at', 'desc')
                ->get();
            $this->setTotalValues();
            $this->calculateCaloriePercentage($user);
        }
    }

    public function setTotalValues()
    {
        $this->totalCalories = $this->loggedMealsToday->sum('calories');
        $this->totalCarbonhydrates = $this->loggedMealsToday->sum('carbonhydrates');
        $this->totalFat = $this->loggedMealsToday->sum('fats');
        $this->totalProtein = $this->loggedMealsToday->sum('protein');
    }

    public function calculateCaloriePercentage(User $user)
    {
        $calorieGoal = $user->calorie_goal;
        $currentCalories = $this->loggedMealsToday->sum('calories');
        $tempPercent = round(($currentCalories / $calorieGoal) * 100);
        if ($tempPercent > 100) {
            $percentage = 100;
        } else {
            $percentage = $tempPercent;
        }
        $this->dispatch('percent-calculated', caloriePercentage: $percentage);
    }

    public function deleteLoggedMeal($pivotMealId = null)
    {
        if(Auth::check())
        {
            $user = User::findOrFail(Auth::id());
            $today = now()->timezone('Europe/Budapest')->startOfDay();
            $pivotRecord = $user->meals()->wherePivot('id', $pivotMealId)->wherePivot('consumed_at', '>=', $today)->get();

            if($pivotRecord)
            {
                $user->meals()->wherePivot('id', $pivotMealId)->detach();
                $this->loggedMealsToday = $user->meals()
                        ->with('users')
                        ->wherePivot('consumed_at', '>=', $today)
                        ->withPivot('id')
                        ->orderBy('consumed_at', 'desc')
                        ->get();
                $this->setTotalValues();
                $this->calculateCaloriePercentage($user);
                $this->dispatch(
                    'toast',
                    type: 'error',
                    title: "Food deleted!",
                    position: 'bottom-end',
                    timer: 3000,
                    background: '#DC143C',
                    color: '#fff',
                    iconColor: '#fff'
                );
            }
        }
    }

    public function render()
    {
        return view('livewire.logged-food-list');
    }
}
