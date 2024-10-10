<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'surface' => fake()->numberBetween(9, 250),
            'rooms' => fake()->numberBetween(1, 5),
            'bedrooms' => fake()->numberBetween(0, 5),
            'floors' => fake()->numberBetween(0, 15),
            'price' => fake()->numberBetween(0, 300000),
            'city' => fake()->city(),
            'address' => fake()->address(),
            'postal_code' => fake()->postcode(),
            'sold' => false
        ];
    }
}
