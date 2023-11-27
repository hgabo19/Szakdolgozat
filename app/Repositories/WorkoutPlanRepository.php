<?php

namespace App\Repositories;

use App\Models\WorkoutPlan;

class WorkoutPlanRepository
{
    public function find($id)
    {
        return WorkoutPlan::findOrFail($id);
    }
}