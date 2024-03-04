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
            $bmr = 655.1 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age);
        } else if ($gender === 'male') {
            $bmr = 66.47 + (13.75 * $weight) + (5.003 * $height) - (6.775 * $age);
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
                DB::raw('DAYOFWEEK(user_meals.consumed_at) as day_of_week'),
                DB::raw('SUM(meals.fats) as total_fats'),
                DB::raw('SUM(meals.carbonhydrates) as total_carbonhydrates'),
                DB::raw('SUM(meals.protein) as total_protein')
            )
            ->join('meals', 'user_meals.meal_id', '=', 'meals.id')
            ->where('user_meals.user_id', '=', $user->id)
            ->whereBetween('user_meals.consumed_at', [$startDate, $endDate])
            ->groupBy(DB::raw('DAYOFWEEK(user_meals.consumed_at)'))
            ->get();

        return $weeklyStats;
    }
}
