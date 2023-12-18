<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WorkoutPlan;
use App\Services\WorkoutPlanService;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    private $workoutPlanService;

    public function __construct(WorkoutPlanService $workoutPlanService) {
        $this->workoutPlanService = $workoutPlanService;
    }

    public function index() {
        $workoutPlans = WorkoutPlan::all();
        return view('workout-plans.index', compact('workoutPlans'));
    }
    public function show(WorkoutPlan $workoutPlan) {
        return view('workout-plans.show', compact('workoutPlan'));
    }

    public function saveWorkoutPlanToUser($userId, $workoutPlanId) {
        
        $isSuccessful = $this->workoutPlanService->saveToUser($userId, $workoutPlanId);

        if($isSuccessful) {
            return redirect()->route('dashboard')->with('success', 'Workout Plan saved :)');
        }
    }
}
