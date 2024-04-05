<?php

namespace App\Policies;

use App\Models\Meal;
use App\Models\User;

class MealPolicy
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

    public function edit(User $user, Meal $meal)
    {
        return $user->is_admin && $meal;
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
