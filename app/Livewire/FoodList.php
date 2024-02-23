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
    public $foodItems = [];


    public function addFoodItem($foodId)
    {
        if (Auth::check()) {
            $food = Meal::findOrFail($foodId);
            $this->foodItems[] = $food;
            $foodName = ucfirst($food->name);
            $this->dispatch(
                'alert',
                type: 'success',
                title: "$foodName added",
                position: 'center',
                timer: 1500,
            );
        }
    }

    public function saveFoodToUser()
    {
        if (Auth::check()) {
            $user = User::findOrFail(Auth::id());

            foreach ($this->foodItems as $food) {
                $user->meals()->attach($food, ['consumed_at' => now()->timezone('Europe/Budapest')]);
            }

            $this->dispatch('food-added');
            $this->foodItems = [];
        }
    }

    public function render()
    {
        $foods = Meal::search($this->search)->paginate(3);
        dd($foods);
        return view('livewire.food-list', [
            'foods' => $foods
        ]);
    }
}
