<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutPlanController;
use App\Models\Exercise;
use App\Models\Meal;
use App\Models\Post;
use App\Models\User;
use App\Models\WorkoutPlan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/admin-list', [ProfileController::class, 'adminList'])->name('profile.admin-list')->can('manage', User::class);
    Route::post('/profile/admin-list/{user}/delete', [ProfileController::class, 'adminDelete'])->name('profile.admin-delete')->can('delete', User::class);
    Route::post('/profile/admin-list/{user}/grant', [ProfileController::class, 'adminRoleToggle'])->name('profile.admin-grant')->can('manage', User::class);
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/followers', [ProfileController::class, 'followerList'])->name('profile.followers');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Health page
    Route::get('/health/admin-list', [HealthController::class, 'adminList'])->name('health.admin-list')->can('manage', Meal::class);
    Route::get('/health', [HealthController::class, 'index'])->name('health.index');
    Route::get('/health/create', [HealthController::class, 'create'])->name('health.create')->can('create', Meal::class);
    Route::get('/health/create/{meal}', [HealthController::class, 'edit'])->name('health.edit')->can('edit', 'meal');
    Route::post('/health/admin-list/{meal}', [HealthController::class, 'destroy'])->name('health.delete')->can('delete', Meal::class);
    Route::get('health/calories', [HealthController::class, 'calories'])->name('health.calories');

    // Exercises page
    Route::get('/exercises/admin-list', [ExerciseController::class, 'adminList'])->name('exercises.admin-list')->can('manage', Exercise::class);
    Route::get('/exercises/index', [ExerciseController::class, 'index'])->name('exercises.index');
    Route::get('/exercises/create', [ExerciseController::class, 'create'])->name('exercises.create')->can('create', Exercise::class);
    Route::get('/exercises/edit/{exercise}', [ExerciseController::class, 'edit'])->name('exercises.edit')->can('edit', 'exercise');
    Route::post('/exercises/admin-list/{exercise}', [ExerciseController::class, 'destroy'])->name('exercises.delete')->can('delete', Exercise::class);
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

    // Blog page
    Route::get('/blog/admin-list', [BlogController::class, 'adminList'])->name('blog.admin-list')->can('manage', Post::class);
    Route::post('/blog/admin-list/{post}', [BlogController::class, 'adminDelete'])->name('blog.admin-delete')->can('delete', 'post');
    Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');
    Route::resource('blog', BlogController::class);
});

require __DIR__ . '/auth.php';
