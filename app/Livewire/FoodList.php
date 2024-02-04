<?php

namespace App\Livewire;

use App\Models\Meal;
use Livewire\Component;
use Livewire\WithPagination;

class FoodList extends Component
{
    use WithPagination;

    public function render()
    {
        $foods = Meal::paginate(3);
        return view('livewire.food-list', [
            'foods' => $foods
        ]);
    }
}
