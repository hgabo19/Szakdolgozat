<?php

namespace App\Services;

class HealthService
{
    public function calculateCalories($gender, $age, $weight, $height, $activity_level, $weight_goal) {
        // basal metabolic rate
        if($gender === 'female') {
            $bmr = 655.1 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age);
        }
        else if($gender === 'male') {
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
}