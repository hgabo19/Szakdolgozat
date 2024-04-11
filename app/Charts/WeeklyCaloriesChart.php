<?php

namespace App\Charts;

use App\Services\HealthService;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class WeeklyCaloriesChart
{
    protected $chart;
    private $healthService;

    public function __construct(LarapexChart $chart, HealthService $healthService)
    {
        $this->chart = $chart;
        $this->healthService = $healthService;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $thisWeekStart = now()->startOfWeek()->timezone('Europe/Budapest');
        $thisWeekEnd = now()->endOfWeek()->timezone('Europe/Budapest');
        $lastWeekStart = now()->subWeek()->startOfWeek()->timezone('Europe/Budapest');
        $lastWeekEnd = now()->subWeek()->endOfWeek()->timezone('Europe/Budapest');

        $thisWeeksCalories = $this->healthService->getWeeklyCalories($thisWeekStart, $thisWeekEnd);
        $lastWeeksCalories = $this->healthService->getWeeklyCalories($lastWeekStart, $lastWeekEnd);
        // dd($thisWeeksCalories);
        // dd($lastWeeksCalories);
        $this_weeks_sum = [];
        $last_weeks_sum = [];

        for ($day = 0; $day < 7; $day++) {
            $this_weeks_sum[$day] = 0;
            $last_weeks_sum[$day] = 0;
        }

        foreach ($thisWeeksCalories as $calories) {
            $dayOfWeek = $calories->day_of_week - 1;
            $this_weeks_sum[$dayOfWeek] += $calories->total_calories;
        }

        foreach ($lastWeeksCalories as $calories) {
            $dayOfWeek = $calories->day_of_week - 1;
            $last_weeks_sum[$dayOfWeek] += $calories->total_calories;
        }

        return $this->chart->lineChart()
            ->addData('This week', $this_weeks_sum)
            ->addData('Last week', $last_weeks_sum)
            ->setXAxis(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
            ->setFontColor('#FFFFFF')
            ->setColors(['#00bfbf', '#ff4081'])
            ->setMarkers(['#FF5722', '#E040FB']);
    }
}
