<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'category' => $this->faker->word,
            'description' => $this->faker->sentence,
            'value' => $this->faker->numberBetween(1, 1000),
            'spent_date' => $this->faker->date(),
        ];
    }
}
