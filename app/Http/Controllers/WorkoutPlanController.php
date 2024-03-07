<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkoutPlan;
use App\Services\WorkoutPlanService;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    public function index()
    {
        $workoutPlans = WorkoutPlan::all();
        return view('workout-plans.index', compact('workoutPlans'));
    }

    public function show(WorkoutPlan $workoutPlan)
    {
        return view('workout-plans.show', compact('workoutPlan'));
    }

    public function saveWorkoutPlanToUser($userId, $workoutPlanId, WorkoutPlanService $workoutPlanService)
    {

        $isSuccessful = $workoutPlanService->saveToUser($userId, $workoutPlanId);

        if ($isSuccessful) {
            return redirect()->route('dashboard')->with('success', 'Workout Plan saved :)');
        }
    }

    public function adminList()
    {
        $workoutPlans = WorkoutPlan::paginate(10);
        return view('workout-plans.admin-list', compact('workoutPlans'));
    }

    public function create()
    {
        return view('workout-plans.create');
    }
}
