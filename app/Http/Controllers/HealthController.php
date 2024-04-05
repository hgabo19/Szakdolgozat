<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyCaloriesChart;
use App\Charts\WeeklyNutritionChart;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HealthController extends Controller
{
    public function index(WeeklyNutritionChart $chart, WeeklyCaloriesChart $calorie_chart)
    {
        return view('health.index', [
            'chart' => $chart->build(),
            'linechart' => $calorie_chart->build(),
            'startOfWeek' => now()->startOfWeek(),
            'endOfWeek' => now()->endOfWeek(),
        ]);
    }

    public function adminList()
    {
        $meals = Meal::paginate(10);
        return view('health.admin-list', compact('meals'));
    }

    public function create()
    {
        return view('health.create');
    }

    public function edit(Meal $meal)
    {
        return view('health.edit', compact('meal'));
    }

    public function destroy(Meal $meal)
    {
        $this->authorize('delete', Meal::class);
        $mealToDelete = Meal::findOrFail($meal->id);
        $mealToDelete->delete();
        session()->flash('success', '"' . $mealToDelete->name . '" deleted successfully!');
        return redirect()->route('health.admin-list');
    }
}
