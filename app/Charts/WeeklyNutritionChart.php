<?php

namespace App\Charts;

use App\Services\HealthService;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class WeeklyNutritionChart
{
    protected $chart;
    private $healthService;

    public function __construct(LarapexChart $chart, HealthService $healthService)
    {
        $this->chart = $chart;
        $this->healthService = $healthService;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $weeklyStats = $this->healthService->getLoggedNutritions();
        $total_fats = [];
        $total_carbs = [];
        $total_protein = [];

        for ($day = 0; $day < 7; $day++) {
            $total_fats[$day] = 0;
            $total_carbs[$day] = 0;
            $total_protein[$day] = 0;
        }

        foreach ($weeklyStats as $stat) {
            $dayOfWeek = $stat->day_of_week - 1;
            $total_fats[$dayOfWeek] += round($stat->total_fats);
            $total_carbs[$dayOfWeek] += round($stat->total_carbonhydrates);
            $total_protein[$dayOfWeek] += round($stat->total_protein);
        }

        return $this->chart->barChart()
            ->addData('Protein', $total_protein)
            ->addData('Fats', $total_fats)
            ->addData('Carbs', $total_carbs)
            ->setXAxis(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
            ->setColors(['#00bfbf', '#ffc107', '#ff4081'])
            ->setMarkers(['#FF5722', '#E040FB'], 10, 10)
            ->setFontColor('#FFFFFF');
    }
}
