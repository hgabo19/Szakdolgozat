<?php

namespace App\Policies;

use App\Models\Exercise;
use App\Models\User;

class ExercisePolicy
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

    public function edit(User $user, Exercise $exercise)
    {
        return $user->is_admin && $exercise;
    }

    public function delete(User $user)
    {
        return $user->is_admin;
    }

    public function manage(User $user)
    {
        return $user->is_admin;
    }
}
