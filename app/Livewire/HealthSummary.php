<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class HealthSummary extends Component
{
    public $weight_goals = array(
        'weight_loss' => "Lose weight",
        'weight_gain' => "Gain weight",
        'maintenance' => "Maintenance"
    );

    #[Computed()]
    public function user()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('livewire.health-summary');
    }
}
