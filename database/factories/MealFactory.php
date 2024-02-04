<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'calories' => fake()->numberBetween(5, 300),
            'carbonhydrates' => fake()->randomFloat(2, 0, 20),
            'fat' => fake()->randomFloat(2, 0, 10),
            'protein' => fake()->randomFloat(2, 0, 2)
        ];
    }
}
