<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkoutPlan;

class WorkoutPlanPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user && $user->is_admin;
    }

    public function edit(User $user, WorkoutPlan $workoutPlan)
    {
        return $user->is_admin && $workoutPlan;
    }

    public function delete(User $user)
    {
        return $user->is_admin;
    }

    public function manage(User $user)
    {
        return $user->is_admin;
    }

    public function saveToUser(User $user)
    {
        return $user && !$user->is_admin;
    }
}
