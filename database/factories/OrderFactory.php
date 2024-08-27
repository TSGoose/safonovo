<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::get()->random();
        $quantity = fake()->numberBetween(1, 10);

        return [
            'email' => fake()->unique()->safeEmail(),
            'status' => OrderStatus::cases()[array_rand(OrderStatus::cases())],
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price * $quantity,
            'created_at' => fake()->dateTimeBetween(now()->startOfYear(), now()->endOfYear()),
        ];
    }
}
