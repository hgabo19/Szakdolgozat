<?php

namespace App\Http\Controllers;

use App\Models\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    public function index() {
        $workoutPlans = WorkoutPlan::all();
        return view('workout-plans.index', compact('workoutPlans'));
    }
    public function show(WorkoutPlan $workoutPlan) {
        return view('workout-plans.show', compact('workoutPlan'));
    }
}
