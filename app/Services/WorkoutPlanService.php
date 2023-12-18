<?php

namespace App\Services;

use App\Models\User;
use App\Models\WorkoutPlan;
use Illuminate\Support\Facades\Auth;

class WorkoutPlanService
{
    public function saveToUser($userId, $workoutPlanId)
    {  
        if(!Auth::check()) {
            return false;
        }

        $user = User::find($userId);
        $workoutPlan = WorkoutPlan::find($workoutPlanId);
        
        if($user && $workoutPlan) {
            $user->workoutPlan()->associate($workoutPlan);
            $user->save();
            return true;
        }
        return false;
    }
}