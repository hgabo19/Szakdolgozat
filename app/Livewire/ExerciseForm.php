<?php

namespace App\Livewire;

use App\Models\Exercise;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Services\ExerciseService;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ExerciseForm extends Component
{

    use WithFileUploads;

    #[Validate('required|string|max:40|min:5')]
    public $name;

    #[Validate('required|string|max:1000|min:100')]
    public $description;

    #[Validate('required')]
    public $muscle_group;

    #[Validate('required|image|max:2048')]
    public $image;

    public function render()
    {
        return view('livewire.exercise-form');
    }

    public function save(ExerciseService $exerciseService)
    {
        $this->authorize('create', Exercise::class);
        $validated = $this->validate();
        $isSuccessful = $exerciseService->save($validated);

        if ($isSuccessful) {
            $this->dispatch(
                'alert',
                type: 'success',
                title: "Exercise created!",
                position: 'center',
                timer: 2000,
                redirectUrl: route('exercises.admin-list'),
            );
        }
    }
}
