<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutPlanController;
use App\Models\Exercise;
use App\Models\WorkoutPlan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Health page
    Route::get('/health', [HealthController::class, 'index'])->name('health.index');
    Route::get('health/calories', [HealthController::class, 'calories'])->name('health.calories');
    Route::get('health/challenges', [HealthController::class, 'challenges'])->name('health.challenges');

    // Exercises page
    Route::get('/exercises/admin-list', [ExerciseController::class, 'adminList'])->name('exercises.admin-list')->can('manage', Exercise::class);
    Route::get('/exercises/create', [ExerciseController::class, 'create'])->name('exercises.create')->can('create', Exercise::class);
    Route::get('/exercises/edit/{exercise}', [ExerciseController::class, 'edit'])->name('exercises.edit')->can('edit', 'exercise');
    Route::post('/exercises/admin-list/{exercise}', [ExerciseController::class, 'destroy'])->name('exercises.delete')->can('delete', Exercise::class);
    Route::get('/exercises/index', [ExerciseController::class, 'index'])->name('exercises.index');
    Route::get('/exercises/{exercise}', [ExerciseController::class, 'show'])->name('exercises.show');


    // Workout plans page
    Route::get('/workout-plans/admin-list', [WorkoutPlanController::class, 'adminList'])->name('workout-plans.admin-list')->can('manage', WorkoutPlan::class);
    Route::get('workout-plans/create', [WorkoutPlanController::class, 'create'])->name('workout-plans.create')->can('create', WorkoutPlan::class);
    Route::post('/workout-plans/admin-list/{workoutPlan}', [WorkoutPlanController::class, 'destroy'])->name('workout-plans.delete')->can('delete', WorkoutPlan::class);
    Route::get('/workout-plans/edit/{workoutPlan}', [WorkoutPlanController::class, 'edit'])->name('workout-plans.edit')->can('edit', 'workoutPlan');
    Route::get('/workout-plans/index', [WorkoutPlanController::class, 'index'])->name('workout-plans.index');
    Route::get('/workout-plans/{workoutPlan}', [WorkoutPlanController::class, 'show'])->name('workout-plans.show');
    // save workout plan to user
    Route::post('/save-workout-plan/{userId}/{workoutPlanId}', [WorkoutPlanController::class, 'saveWorkoutPlanToUser'])->name('save.workout.plan');
});

require __DIR__ . '/auth.php';
