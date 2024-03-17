<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\WorkoutPlan;
use App\Services\WorkoutPlanService;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class WorkoutPlanForm extends Component
{

    use WithFileUploads;

    public $title;
    public $description;
    public $difficulty;
    public $image;
    public $numberOfDays = 3;
    public $days = [];
    public $all_exercises;
    public $saveButtonVisible = false;

    public function rules()
    {
        return [
            'title' => 'required|string|min:20|max:120',
            'description' => 'required|string|min:50|max:3000',
            'difficulty' => 'required',
            'numberOfDays' => 'required',
            'image' => 'required|image|max:2048',
            'days.*.exercises.*.id' => 'required',
            'days.*.exercises.*.sets' => 'required|integer|between:2,10',
            'days.*.exercises.*.reps' => 'required|integer|between:5,25',
        ];
    }

    public function messages()
    {
        return [
            'days.*.exercises.*.sets.required' => 'Sets are required.',
            'days.*.exercises.*.sets.between' => 'Sets must be between 2 and 10.',
            'days.*.exercises.*.reps.required' => 'Reps are required.',
            'days.*.exercises.*.reps.between' => 'Reps must be between 5 and 25.',
        ];
    }

    public function mount()
    {
        $this->all_exercises = Exercise::all();
    }

    public function render()
    {
        return view('livewire.workout-plan-form');
    }

    public function save(WorkoutPlanService $workoutPlanService)
    {
        $this->authorize('create', WorkoutPlan::class);
        $validated = $this->validate();
        $isSuccessful = $workoutPlanService->saveWorkoutPlan($validated);

        if ($isSuccessful) {
            $this->dispatch(
                'alert',
                type: 'success',
                title: "Workout plan created!",
                position: 'center',
                timer: 2000,
                redirectUrl: route('workout-plans.admin-list'),
            );
        }
    }

    public function setDays()
    {
        $this->days = [];
        for ($i = 0; $i < $this->numberOfDays; $i++) {
            $this->days[] = [
                'exercises' => [
                    ['id' => '', 'sets' => '', 'reps' => '']
                ]
            ];
        }
        $this->saveButtonVisible = true;
    }

    public function addExercise($dayIndex)
    {
        $this->days[$dayIndex]['exercises'][] = [
            'id' => '',
            'sets' => '',
            'reps' => '',
        ];
    }

    public function deleteExercise($dayIndex, $exerciseIndex)
    {
        unset($this->days[$dayIndex]['exercises'][$exerciseIndex]);
    }
}
