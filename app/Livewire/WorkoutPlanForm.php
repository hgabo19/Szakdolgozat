<?php

namespace App\Livewire;

use App\Models\Exercise;
use App\Models\WorkoutPlan;
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
            'description' => 'required|string|min:50|max:300',
            'difficulty' => 'required',
            'numberOfDays' => 'required|min:2|max:5',
            'image' => 'required|image|max:2048',
            'days.*.exercises.*.id' => 'required',
            'days.*.exercises.*.sets' => 'required|number|min:2|max:10',
            'days.*.exercises.*.reps' => 'required|number|min:5|max:25',
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

    public function save()
    {
        $this->validate();

        if ($this->image) {
            $filePath = $this->image->store('workout_plans', 'public');
        }

        $workoutPlan = new WorkoutPlan();
        $workoutPlan->title = $this->title;
        $workoutPlan->image_path = $filePath;
        $workoutPlan->description = $this->description;
        $workoutPlan->duration = (int)$this->numberOfDays;
        $workoutPlan->save();

        foreach ($this->days as $day) {
            foreach ($day['exercises'] as $exercise) {
            }
        }

        // dd($this->days);
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
        // $this->days[$dayIndex]['exercises'] = array_values($this->days[$dayIndex]['exercises']);
    }
}
