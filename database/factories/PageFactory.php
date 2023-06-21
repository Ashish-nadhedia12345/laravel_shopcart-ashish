<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
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
            'title' => fake()->text(10),
            'description' =>fake()->text(500),
            'price' => '150',
            'image' => 'noimg.png',
        ];
    }
}
