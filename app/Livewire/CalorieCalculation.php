<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\HealthService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CalorieCalculation extends Component
{
    #[Validate('required')]
    public $gender;

    #[Validate('required|min:2|max:2')]
    public $age;

    #[Validate('required|min:2|max:3')]
    public $weight;

    #[Validate('required|min:3|max:3')]
    public $height;

    #[Validate('required', as: 'activity level')]
    public $activity_level;

    #[Validate('required', as: 'weight goal')]
    public $weight_goal;

    public function mount()
    {
        if (Auth::user()->calorie_goal) {
            $this->gender = Auth::user()->gender;
            $this->age = Auth::user()->age;
            $this->weight = Auth::user()->weight;
            $this->height = Auth::user()->height;
            $this->activity_level = Auth::user()->activity_level;
            $this->weight_goal = Auth::user()->weight_goal;
        }
    }

    public function saveCalories(HealthService $healthService)
    {
        $this->validate();
        $ageParsed = (int)$this->age;
        $weightParsed = (int)$this->weight;
        $heightParsed = (int)$this->height;

        if (Auth::check()) {
            $calories = $healthService->calculateCalories($this->gender, $ageParsed, $weightParsed, $heightParsed, $this->activity_level, $this->weight_goal);
            // dd($calories);
            $user = User::find(Auth::user()->id);
            try {
                $user->gender = $this->gender;
                $user->age = $ageParsed;
                if ($user->starting_weight === null) {
                    $user->starting_weight = $weightParsed;
                }
                $user->weight = $weightParsed;
                $user->height = $heightParsed;
                $user->calorie_goal = $calories;
                $user->activity_level = $this->activity_level;
                $user->weight_goal = $this->weight_goal;
                $user->save();
                return redirect()->route('health.index');
            } catch (Exception $e) {
                return response()->json(['error' => 'User not found'], 404);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.calorie-calculation');
    }
}
