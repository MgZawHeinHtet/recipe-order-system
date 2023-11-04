<?php

namespace Database\Factories;

use App\Models\Category;
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
            'photo'=>fake()->imageUrl(),
            'price'=>fake()->randomNumber(4),
            'category_id' => Category::factory()
        ];
    }
}
