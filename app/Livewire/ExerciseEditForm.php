<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Services\ExerciseService;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ExerciseEditForm extends Component
{

    use WithFileUploads;

    #[Locked]
    public $exerciseId;

    #[Validate('required|string|max:40|min:5')]
    public $name;

    #[Validate('required|string|max:500|min:100')]
    public $description;

    #[Validate('required')]
    public $muscle_group;

    #[Validate('nullable|image|max:2048')]
    public $image;

    public $exerciseImg;

    public function mount(Exercise $exercise)
    {
        $exercise = Exercise::findOrFail($exercise->id);

        $this->exerciseId = $exercise->id;
        $this->name = $exercise->name;
        $this->description = $exercise->description;
        $this->muscle_group = $exercise->muscle_group;
        $this->exerciseImg = $exercise->image_path;
    }

    public function render()
    {
        return view('livewire.exercise-edit-form');
    }

    public function save(ExerciseService $exerciseService)
    {
        $exercise = Exercise::findOrFail($this->exerciseId);
        $this->authorize('edit', $exercise);
        $validated = $this->validate();

        if ($exerciseService->hasChanged($validated, $exercise)) {
            $isSuccessful = $exerciseService->update($validated, $exercise);

            if ($isSuccessful) {
                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: "Exercise updated!",
                    position: 'center',
                    timer: 2000,
                    redirectUrl: route('exercises.admin-list'),
                );
            }
        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: "Please change something to update!",
                position: 'center',
                timer: 2500,
            );
        }
    }
}
