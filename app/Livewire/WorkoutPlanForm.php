<?php

namespace App\Livewire;

use App\Models\Exercise;
use Livewire\Attributes\Validate;
use Livewire\Component;

class WorkoutPlanForm extends Component
{
    public $title;
    public $description;
    public $difficulty;
    public $sets;
    public $reps;
    #[Validate('required|min:2|max:5')]
    public $numberOfDays = 3;
    public $days = [];
    public $all_exercises;

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
        dd($this->days);
    }

    public function setDays()
    {
        $this->validate([
            'numberOfDays' => 'required|integer|min:2|max:5'
        ]);
        $this->days = [];
        for ($i = 0; $i < $this->numberOfDays; $i++) {
            $this->days[] = [
                'exercises' => [
                    ['id' => '', 'sets' => '', 'reps' => '']
                ]
            ];
        }
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
        // dd($dayIndex, $exerciseIndex);
        unset($this->days[$dayIndex]['exercises'][$exerciseIndex]);
        $this->days[$dayIndex]['exercises'] = array_values($this->days[$dayIndex]['exercises']);
    }
}
