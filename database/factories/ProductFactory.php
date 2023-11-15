<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'image' => 'https://t4.ftcdn.net/jpg/02/50/29/85/240_F_250298556_4iYRL8VQKTM1B1jP7iJgarbnH6hoXU8S.jpg',
            'price' => fake()->randomFloat(2, 0, 1000),
            'discount_price' => fake()->randomFloat(2, 0, 1000),
            'category_id' => fake()->numberBetween(1, 5),
            // category_id: 1

        ];
    }
}
