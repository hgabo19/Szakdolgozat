<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutPlanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');
Route::resource('exercises', ExerciseController::class);

// workout plans
Route::get('/workout-plans', [WorkoutPlanController::class, 'index'])->name('workout-plans.index');
Route::get('/workout-plans/{workoutPlan}', [WorkoutPlanController::class, 'show'])->name('workout-plans.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // save workout plan to user
    Route::post('/save-workout-plan/{userId}/{workoutPlanId}', [WorkoutPlanController::class, 'saveWorkoutPlanToUser'])->name('save.workout.plan');

});

require __DIR__.'/auth.php';
