<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HealthSummary extends Component
{
    public $weight_goals = array(
                            'weight_loss' => "Lose weight",
                            'weight_gain'=> "Gain weight",
                            'maintenance'=> "Maintenance");
                            
    public function render()
    {   
        $user = Auth::user();
        return view('livewire.health-summary')->with([
            'age' => $user->age,
            'gender' => $user->gender,
            'height' => $user->height,
            'current_weight' => $user->weight,
            'starting_weight' => $user->starting_weight,
            'weight_goal' => $user->weight_goal,
            'calorie_goal' => $user->calorie_goal,
        ]);
    }
}
