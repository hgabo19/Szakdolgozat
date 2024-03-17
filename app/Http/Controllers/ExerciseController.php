<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::orderBy('muscle_group')->get();

        return view('exercises.index', compact('exercises'));
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.show', compact('exercises'));
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

    public function store(Request $request)
    {

        Exercise::create($request->all());

        return redirect()->route('exercises.index')->with('success', 'Exercise created successfully.');
    }


    public function edit(Exercise $exercise)
    {
        return view('exercises.edit', compact('exercise'));
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully.');
    }
}
