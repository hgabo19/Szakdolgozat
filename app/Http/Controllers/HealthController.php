<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyCaloriesChart;
use App\Charts\WeeklyNutritionChart;
use Illuminate\Http\Request;

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

    public function calories()
    {
        return view('health.calories');
    }

    public function challenges()
    {
        return view('health.challenges');
    }
}
