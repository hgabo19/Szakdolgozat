<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Exercise;
use App\Models\Post;
use App\Models\WorkoutPlan;
use App\Policies\ExercisePolicy;
use App\Policies\PostPolicy;
use App\Policies\WorkoutPlanPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //  
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
