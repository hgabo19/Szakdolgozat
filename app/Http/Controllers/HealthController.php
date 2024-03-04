<?php

namespace App\Http\Controllers;

use App\Charts\WeeklyNutritionChart;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function index(WeeklyNutritionChart $chart)
    {
        return view('health.index', [
            'chart' => $chart->build()
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
