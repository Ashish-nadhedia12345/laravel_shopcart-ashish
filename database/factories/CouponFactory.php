<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(3, true);
        $code = str_replace(" ","-", $title);
        return [
            'title' => $title,
            'code' => $code,
            'type' => fake()->randomElement(['fixed','percent']),
            'amount' => rand(10,100),
            'valid_upto' => '2023-12-31'
        ];
    }
}
