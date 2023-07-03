<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
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
            'cat_id' => Category::all()->random()->id,
            'title' => fake()->sentence(),
            'description' => fake()->sentence(500),
            'price' => rand(100, 1000),
            'image' => 'noimg.png',
        ];
    }
}
