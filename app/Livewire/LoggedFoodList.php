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

    public function mount()
    {
        $user = User::findOrFail(Auth::id());
        $today = now()->timezone('Europe/Budapest')->startOfDay();

        $this->loggedMealsToday = $user->meals()
                ->with('users')
                ->wherePivot('consumed_at', '>=', $today)
                ->get();
    }

    #[On('food-added')]
    public function addFoodsToList($foodItems)
    {
        foreach ($foodItems as $foodItem)
        {
            $meal = new Meal($foodItem);
            $meal->setConnection('mysql');
            $meal->setTable('meals');
            $this->loggedMealsToday->push($meal);
        }
    }

    public function render()
    {
        return view('livewire.logged-food-list');
    }
}
