<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Process\FakeProcessSequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(5,true),
            'description' => fake()->paragraph(),
            'img'=>fake()->imageUrl(),
            'rating'=>fake()->numberBetween(1,6),
            'price'=>fake()->randomNumber(4)
        ];
    }
}
