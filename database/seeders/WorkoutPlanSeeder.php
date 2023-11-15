<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\WorkoutPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a workout plan
        $workoutPlan = WorkoutPlan::create([
            'title' => 'Workout Plan',
            'image_path' => 'images/workout_plans/workout_img.jpg',
            'description' => 'Ez a legelso workout planem',
            'duration' => 3,
        ]);

        $workoutPlan2 = WorkoutPlan::create([
            'title' => 'Workout Plan 2',
            'image_path' => 'images/workout_plans/plan2.jpg',
            'description' => 'Ez a masodik workout planem',
            'duration' => 5,
        ]);

        // Create exercises
        $exercise1 = Exercise::create([
            'name' => 'Back exercise',
            'description' => 'Description for back exercise',
            'image_path' => 'images/exercises/back/back_workout.jpg',
            'muscle_group' => 'back',
        ]);

        $exercise2 = Exercise::create([
            'name' => 'Chest exercise',
            'description' => 'Description for chest exercise',
            'image_path' => 'images/exercises/chest/chest_workout.jpg',
            'muscle_group' => 'chest',
        ]);

        $exercise3 = Exercise::create([
            'name' => 'leg exercise',
            'description' => 'Description for leg exercise',
            'image_path' => 'images/exercises/leg/leg.jpg',
            'muscle_group' => 'leg',
        ]);

        // Connect exercises to the workout plan through the pivot table
        $workoutPlan->exercises()->attach([$exercise1->id, $exercise2->id]);
        $workoutPlan2->exercises()->attach([$exercise2->id, $exercise3->id]);
    }
}
