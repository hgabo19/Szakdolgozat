<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HealthService
{
    public function calculateCalories($gender, $age, $weight, $height, $activity_level, $weight_goal)
    {
        // basal metabolic rate
        if ($gender === 'female') {
            $bmr = 655 + (9.6 * $weight) + (1.9 * $height) - (4.7 * $age);
        } else if ($gender === 'male') {
            $bmr = 66.46 + (13.8 * $weight) + (5.0 * $height) - (6.8 * $age);
        }

        $activity_values = [
            'lightly_active' => 1.375,
            'moderately_active' => 1.55,
            'very_active' => 1.9,
        ];

        //active metabolic rate 
        $amr = $bmr * $activity_values[$activity_level];
        switch ($weight_goal) {
            case 'weight_loss':
                $calories = $amr * 0.8;
            case 'maintenance':
                $calories = $amr;
            case 'weight_gain':
                $calories = $amr * 1.1;
            default:
                $calories = $amr;
        }
        return $calories;
    }

    public function getLoggedNutritions()
    {
        $user = Auth::user();
        $startDate = now()->startOfWeek()->timezone('Europe/Budapest');
        $endDate = now()->endOfWeek()->timezone('Europe/Budapest');

        $weeklyStats = DB::table('user_meals')
            ->select(
                DB::raw('(WEEKDAY(user_meals.consumed_at) + 1) as day_of_week'),
                DB::raw('SUM(meals.fats) as total_fats'),
                DB::raw('SUM(meals.carbonhydrates) as total_carbonhydrates'),
                DB::raw('SUM(meals.protein) as total_protein')
            )
            ->join('meals', 'user_meals.meal_id', '=', 'meals.id')
            ->where('user_meals.user_id', '=', $user->id)
            ->whereBetween('user_meals.consumed_at', [$startDate, $endDate])
            ->groupBy(DB::raw('(WEEKDAY(user_meals.consumed_at) + 1)'))
            ->get();

        return $weeklyStats;
    }

    public function getWeeklyCalories($weekStart, $weekEnd)
    {
        $user = Auth::user();
        $startDate = $weekStart;
        $endDate = $weekEnd;

        $weeklyCalories = DB::table('user_meals')
            ->select(
                DB::raw('(WEEKDAY(user_meals.consumed_at) + 1) as day_of_week'),
                DB::raw('SUM(meals.calories) as total_calories')
            )
            ->join('meals', 'user_meals.meal_id', '=', 'meals.id')
            ->where('user_meals.user_id', '=', $user->id)
            ->whereBetween('user_meals.consumed_at', [$startDate, $endDate])
            ->groupBy(DB::raw('(WEEKDAY(user_meals.consumed_at) + 1)'))
            ->get();

        return $weeklyCalories;
    }
}
