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
    public $message = '';
    public $foodItems = [];

    public function addFoodItem($foodId) 
    {
        if(Auth::check()) 
        {
            $food = Meal::findOrFail($foodId);
            $this->foodItems[] = $food;
            $this->message = "Item added!";
            // $this->emit('itemAdded');
        }
    }

    public function saveFoodToUser() 
    {
        if(Auth::check()) 
        {
            $user = User::findOrFail(Auth::id());
            foreach($this->foodItems as $food) {
                $user->meals()->attach($food, ['consumed_at' => now()->timezone('Europe/Budapest')]);
            }
            $this->dispatch('food-added', foodItems: $this->foodItems);
            // $today = now()->timezone('Europe/Budapest')->startOfDay();
            
            // $totalCalories = $user->meals()
            // ->wherePivot('consumed_at', '>=', $today)
            // ->with('meal')
            // ->sum('calories');
            

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
