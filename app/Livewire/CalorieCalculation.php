<?php

namespace App\Livewire;

use App\Models\User;
use App\Services\HealthService;
use Exception;
use Illuminate\Support\Facades\Auth;
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

    public function saveCalories(HealthService $healthService)
    {
        $this->validate();
        
        $ageParsed = (int)$this->age;
        $weightParsed = (int)$this->weight;
        $heightParsed = (int)$this->height;

        $calories = $healthService->calculateCalories($this->gender, $ageParsed, $weightParsed, $heightParsed, $this->activity_level, $this->weight_goal);
        if(Auth::check()){
            try{
                $user = User::findOrFail(Auth::id());
                $user->gender = $this->gender;
                $user->age = $ageParsed;
                if($user->starting_weight === null) {
                    $user->starting_weight = $weightParsed;
                }
                $user->weight = $weightParsed;
                $user->height = $heightParsed;
                $user->activity_level = $this->activity_level;
                $user->weight_goal = $this->weight_goal;
                $user->calorie_goal = $calories;
                
                $user->save();

                $this->reset('gender', 'age', 'weight', 'height', 'activity_level', 'weight_goal');
                $this->dispatch('close-modal');
                
            } catch (Exception $e) {
                return response()->json(['error' => 'User not found'], 404);
            }
        }
        else {
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.calorie-calculation');
    }
}
