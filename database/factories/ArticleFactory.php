<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->sentences(2, true),
            'author' => fake()->name(),
            'text' => fake()->realText(),
            'tags' => [
                fake()->word(),
                fake()->word(),
                fake()->word(),
            ],
        ];
    }
}
