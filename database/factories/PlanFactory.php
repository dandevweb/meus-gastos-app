<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->word();
        return [
            'name' => $name,
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(0, 100000),
            'slug' => Str::slug($name),
            'reference' => $this->faker->word(),
        ];
    }
}
