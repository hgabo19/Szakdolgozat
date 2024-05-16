<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::orderBy('muscle_group')->get();

        return view('exercises.index', compact('exercises'));
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercise'));
    }

    public function adminList()
    {
        $exercises = Exercise::paginate(10);
        return view('exercises.admin-list', compact('exercises'));
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    public function destroy(Exercise $exercise, ExerciseService $exerciseService)
    {
        $this->authorize('delete', Exercise::class);
        $exerc = Exercise::findOrFail($exercise->id);
        $isSuccessful = $exerciseService->delete($exerc);
        if ($isSuccessful) {
            session()->flash('success', '"' . $exerc->name . '" deleted successfully!');
            return redirect()->route('exercises.admin-list');
        }
    }
}
