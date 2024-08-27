<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->unique()->word();

        return [
            'name' => $name,
            'short_description' => fake()->sentences(2, true),
            'full_description' => fake()->realText(),
            'price' => fake()->numberBetween(100, 1000),
            'slug' => Str::slug($name),
            'attributes' => [
                'color' => $this->faker->safeColorName,
                'size' => $this->faker->randomElement(['small', 'medium', 'large']),
                'weight' => $this->faker->randomFloat(2, 0.5, 5.0),
                'material' => $this->faker->randomElement(['wood', 'metal', 'plastic']),
            ],
            'product_type_id' => fake()->numberBetween(1, 5),
        ];
    }
}
