<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'image' => 'https://www.wikihow.com/images/thumb/4/45/Make-a-Fake-ID-Step-1-Version-3.jpg/v4-460px-Make-a-Fake-ID-Step-1-Version-3.jpg.webp',
        ];
    }
}
