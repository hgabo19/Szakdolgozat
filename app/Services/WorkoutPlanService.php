<?php

namespace App\Services;

use App\Models\User;
use App\Models\WorkoutPlan;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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

    public function updateWorkoutPlan($validated, $workoutPlanId)
    {
        DB::transaction(function () use ($validated, $workoutPlanId) {
            try {

                $workoutPlan = WorkoutPlan::find($workoutPlanId);
                if (!$workoutPlan) {
                    throw new Exception('Workout plan with ID ' . $workoutPlanId . ' not found.');
                }

                if ($validated['image'] != null) {
                    $filePath = $validated['image']->store('images/workout_plans', 'public');
                    $workoutPlan->image_path = $filePath;
                }


                $workoutPlan->title = $validated['title'];
                $workoutPlan->description = $validated['description'];
                $workoutPlan->duration = (int)$validated['numberOfDays'];
                $workoutPlan->difficulty = $validated['difficulty'];
                $workoutPlan->created_at = now()->timezone('Europe/Budapest');
                $workoutPlan->save();
                $workoutPlan->exercises()->detach();

                foreach ($validated['days'] as $dayIndex => $day) {
                    foreach ($day as $exercise) {
                        $workoutPlan->exercises()->attach($exercise['id'], [
                            'day' => $dayIndex + 1,
                            'sets' => $exercise['sets'],
                            'reps' => $exercise['reps']
                        ]);
                    }
                }
            } catch (Exception $e) {
                throw new Exception($e . 'Failed to update!');
            }
        });
        return true;
    }

    public function saveWorkoutPlan($validated)
    {
        DB::transaction(function () use ($validated) {
            try {
                $workoutPlan = new WorkoutPlan();

                if ($validated['image']) {
                    $filePath = $validated['image']->store('images/workout_plans', 'public');
                    $workoutPlan->image_path = $filePath;
                }

                $workoutPlan->title = $validated['title'];
                $workoutPlan->description = $validated['description'];
                $workoutPlan->duration = (int)$validated['numberOfDays'];
                $workoutPlan->difficulty = $validated['difficulty'];
                $workoutPlan->created_at = now()->timezone('Europe/Budapest');
                $workoutPlan->save();

                foreach ($validated['days'] as $dayIndex => $day) {
                    foreach ($day['exercises'] as $exercise) {
                        $workoutPlan->exercises()->attach($exercise['id'], [
                            'day' => $dayIndex + 1,
                            'sets' => $exercise['sets'],
                            'reps' => $exercise['reps']
                        ]);
                    }
                }
            } catch (Exception $e) {
                throw new Exception($e);
            }
        }, 5);
        return true;
    }

    public function hasChanged($workoutPlan, $validated)
    {
        if (
            $workoutPlan->title != $validated['title'] ||
            $workoutPlan->description != $validated['description'] ||
            $workoutPlan->duration != $validated['numberOfDays'] ||
            $validated['image'] instanceof TemporaryUploadedFile ||
            $workoutPlan->difficulty != $validated['difficulty']
        ) {
            return true;
        } else {
            $groupedExercises = $this->groupExercisesByDay($workoutPlan);
            foreach ($validated['days'] as $dayIndex => $day) {
                foreach ($day as $exerciseIndex => $exercise) {
                    if (
                        $exercise['id'] != $groupedExercises[$dayIndex][$exerciseIndex]['id'] ||
                        $exercise['sets'] != $groupedExercises[$dayIndex][$exerciseIndex]['sets'] ||
                        $exercise['reps'] != $groupedExercises[$dayIndex][$exerciseIndex]['reps']
                    ) return true;
                }
            }
        }
        return false;
    }
}
