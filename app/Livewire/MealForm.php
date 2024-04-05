<?php

namespace App\Livewire;

use App\Models\Meal;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MealForm extends Component
{
    public $meal;

    #[Validate('required|string|min:3|max:50')]
    public $name;

    #[Validate('required|numeric')]
    public $calories;

    #[Validate('required|numeric')]
    public $carbs;

    #[Validate('required|numeric')]
    public $fats;

    #[Validate('required|numeric')]
    public $protein;

    public function mount()
    {
        if ($this->meal) {
            $this->name = $this->meal->name;
            $this->calories = $this->meal->calories;
            $this->carbs = $this->meal->carbonhydrates;
            $this->fats = $this->meal->fats;
            $this->protein = $this->meal->protein;
        }
    }

    public function render()
    {
        return view('livewire.meal-form');
    }

    public function save()
    {
        $this->authorize('create', Meal::class);
        $validated = $this->validate();

        if (!$this->meal) {
            $meal = new Meal();
        } else {
            $meal = Meal::find($this->meal->id);
        }

        $meal->name = $validated['name'];
        $meal->calories = $validated['calories'];
        $meal->carbonhydrates = $validated['carbs'];
        $meal->fats = $validated['fats'];
        $meal->protein = $validated['protein'];
        $meal->created_at = now()->timezone('Europe/Budapest');
        $meal->save();

        $this->dispatch(
            'alert',
            type: 'success',
            title: "Meal created!",
            position: 'center',
            timer: 2000,
            redirectUrl: route('health.admin-list'),
        );
    }
}
