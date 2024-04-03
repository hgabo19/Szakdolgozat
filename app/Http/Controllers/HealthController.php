<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyCaloriesChart;
use App\Charts\WeeklyNutritionChart;
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
}
