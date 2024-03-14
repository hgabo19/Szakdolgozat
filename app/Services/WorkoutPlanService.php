<?php

namespace App\Services;

use App\Models\User;
use App\Models\WorkoutPlan;
use Illuminate\Support\Facades\Auth;

class WorkoutPlanService
{
    public function saveToUser($userId, $workoutPlanId)
    {
        if (!Auth::check()) {
            return false;
        }

        $user = User::find($userId);
        $workoutPlan = WorkoutPlan::find($workoutPlanId);

        if ($user && $workoutPlan) {
            $user->workoutPlan()->associate($workoutPlan);
            $user->save();
            return true;
        }
        return false;
    }

    public function groupExercisesByMuscleGroup(WorkoutPlan $workoutPlan)
    {
        $groupedExercises = [];
        $exercises = $workoutPlan->exercises()->orderByPivot('day')->get();
        foreach ($exercises as $exercise) {
            $day = $exercise->pivot->day;
            $muscleGroup = $exercise->muscle_group;

            // Group exercises by day
            if (!isset($groupedExercises[$day])) {
                $groupedExercises[$day] = [];
            }

            // Group exercises by muscle group within each day
            if (!isset($groupedExercises[$day][$muscleGroup])) {
                $groupedExercises[$day][$muscleGroup] = [];
            }

            $groupedExercises[$day][$muscleGroup][] = [
                'name' => $exercise->name,
                'sets' => $exercise->pivot->sets,
                'reps' => $exercise->pivot->reps,
            ];
        }
        return $groupedExercises;
    }

    public function groupExercisesByDay(WorkoutPlan $workoutPlan)
    {
        $groupedExercises = [];
        $exercises = $workoutPlan->exercises()->orderByPivot('day')->get();
        foreach ($exercises as $exercise) {
            $day = $exercise->pivot->day;

            // Group exercises by day
            if (!isset($groupedExercises[$day])) {
                $groupedExercises[$day] = [];
            }

            $groupedExercises[$day][] = [
                'id' => $exercise->id,
                'sets' => $exercise->pivot->sets,
                'reps' => $exercise->pivot->reps,
            ];
        }
        return $groupedExercises;
    }
}
