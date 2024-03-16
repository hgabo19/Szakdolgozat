<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\WorkoutPlan;
use App\Services\WorkoutPlanService;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class WorkoutPlanEditForm extends Component
{

    use WithFileUploads;

    #[Locked]
    public $workoutPlanId;

    public $title;
    public $difficulty;
    public $description;
    public $planImage;
    public $image;
    public $numberOfDays;
    public $previousDays;
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
            'image' => 'nullable|image|max:2048',
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
        // $this->image = $workoutPlan->image_path;
        $this->numberOfDays = $workoutPlan->duration;
        $this->previousDays = $this->numberOfDays;
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
    }

    public function render()
    {
        return view('livewire.workout-plan-edit-form');
    }

    public function save(WorkoutPlanService $workoutPlanService)
    {
        $workoutPlan = WorkoutPlan::find($this->workoutPlanId);
        $this->authorize('edit', $workoutPlan);
        $validated = $this->validate();
        if ($workoutPlanService->hasChanged($workoutPlan, $validated)) {
            $isSuccessful = $workoutPlanService->updateWorkoutPlan($validated, $this->workoutPlanId);
            if ($isSuccessful) {
                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: "Workout plan updated!",
                    position: 'center',
                    timer: 2000,
                    redirectUrl: route('workout-plans.admin-list'),
                );
            } else {
                $this->dispatch(
                    'alert',
                    type: 'danger',
                    title: "Nothing has changed!",
                    position: 'center',
                    timer: 2000,
                );
            }
        }
    }

    #[On('daysConfirmed')]
    public function setDays()
    {
        if ($this->previousDays < $this->numberOfDays) {
            for ($i = $this->previousDays; $i < $this->numberOfDays; $i++) {
                $this->days[$i + 1][] = [
                    'id' => '',
                    'sets' => '',
                    'reps' => ''
                ];
            }
            $this->previousDays = $this->numberOfDays;
        } else if ($this->previousDays > $this->numberOfDays) {
            for ($i = $this->previousDays; $i > $this->numberOfDays; $i--) {
                array_pop($this->days);
            }
            $this->previousDays = $this->numberOfDays;
        }
    }

    public function addExercise($dayIndex)
    {
        $this->days[$dayIndex][] = [
            'id' => '',
            'sets' => '',
            'reps' => '',
        ];
    }

    public function confirmDays()
    {
        if ($this->previousDays > $this->numberOfDays) {
            $this->dispatch('swal:daysConfirm');
        } else {
            $this->setDays();
        }
    }

    public function deleteExercise($dayIndex, $exerciseIndex)
    {
        unset($this->days[$dayIndex][$exerciseIndex]);
    }
}
