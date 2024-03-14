<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\WorkoutPlan;
use App\Services\WorkoutPlanService;
use Livewire\Attributes\Locked;
use Livewire\Component;

class WorkoutPlanEditForm extends Component
{
    #[Locked]
    public $workoutPlanId;

    public $title;
    public $difficulty;
    public $description;
    public $planImage;
    public $image;
    public $numberOfDays;
    public $days = [];
    public $savedExercises;
    public $all_exercises;

    public function rules()
    {
        return [
            'title' => 'required|string|min:20|max:120',
            'description' => 'required|string|min:50|max:3000',
            'difficulty' => 'required',
            'numberOfDays' => 'required',
            'image' => 'required|image|max:2048',
            'days.*.*.id' => 'required',
            'days.*.*.sets' => 'required|integer|between:2,10',
            'days.*.*.reps' => 'required|integer|between:5,25',
        ];
    }

    public function messages()
    {
        return [
            'days.*.*.sets.required' => 'Sets are required.',
            'days.*.*.sets.between' => 'Sets must be between 2 and 10.',
            'days.*.*.reps.required' => 'Reps are required.',
            'days.*.*.reps.between' => 'Reps must be between 5 and 25.',
        ];
    }

    public function mount(WorkoutPlan $wPlan, WorkoutPlanService $workoutPlanService)
    {
        $workoutPlan = WorkoutPlan::findOrFail($wPlan->id);
        $this->workoutPlanId = $workoutPlan->id;
        $this->title = $workoutPlan->title;
        $this->difficulty = $workoutPlan->difficulty;
        $this->description = $workoutPlan->description;
        $this->image = $workoutPlan->image;
        $this->numberOfDays = $workoutPlan->duration;

        $this->all_exercises = Exercise::all();
        $savedExercises = $workoutPlanService->groupExercisesByDay($workoutPlan);
        $this->days = [];
        foreach ($savedExercises as $dayIndex => $day) {
            $dayExercises = [];
            foreach ($day as $exercise) {
                $dayExercises[] = [
                    'id' => $exercise['id'],
                    'sets' => $exercise['sets'],
                    'reps' => $exercise['reps'],
                ];
            }
            $this->days[$dayIndex] = $dayExercises;
        }
        // dd($this->days);
    }

    public function render()
    {
        return view('livewire.workout-plan-edit-form');
    }
}
