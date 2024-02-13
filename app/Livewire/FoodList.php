<?php

namespace App\Livewire;

use App\Models\Meal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class FoodList extends Component
{
    use WithPagination;

    public $search = '';

    public function saveFoodToUser($id) 
    {
        if(Auth::check())
        $food = Meal::find($id);

    }

    public function render()
    {
        $foods = Meal::search($this->search)->paginate(3);
        return view('livewire.food-list', [
            'foods' => $foods
        ]);
    }
}
