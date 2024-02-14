<?php

namespace App\Livewire;

use App\Models\Meal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class FoodList extends Component
{
    use WithPagination;

    public $search = '';
    public $neededCaloriesLogged = false;

    public function saveFoodToUser($foodId) 
    {
        if(Auth::check()) 
        {
            $food = Meal::findOrFail($foodId);
            $user = User::findOrFail(Auth::id());
            $user->meals()->attach($food, ['consumed_at' => now()->timezone('Europe/Budapest')]);
            
            $today = now()->timezone('Europe/Budapest')->startOfDay();
            
            // Eager load meals with calories USE INSIDE THE LOGGING TABLE
            // $loggedMealsToday = $user->meals()
            //     ->wherePivot('consumed_at', '>=', $today)
            //     ->with('meal') // Eager load associated meal model
            //     ->get();

            $totalCalories = $user->meals()
            ->wherePivot('consumed_at', '>=', $today)
            ->with('meal')
            ->sum('calories');
            
            if($totalCalories >= $user->calorie_goal)
            {
                $neededCaloriesLogged = true;
            }

        }

    }

    public function render()
    {
        $foods = Meal::search($this->search)->paginate(3);
        return view('livewire.food-list', [
            'foods' => $foods
        ]);
    }
}
