<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\personTask>
 */
class personTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 4),
            'namaTask' => fake()->word(),
            'startDate' => fake()->dateTimeThisYear(),
            'dueDate' => fake()->dateTimeBetween('now','+1 week'),
        ];
    }
}
