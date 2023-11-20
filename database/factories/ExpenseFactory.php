<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'type' => $this->faker->randomElement([1, 2]),
            'expense_date' => $this->faker->dateTime(),
            'amount' => $this->faker->numberBetween(0, 100000),
            'description' => $this->faker->sentence(),

        ];
    }
}
