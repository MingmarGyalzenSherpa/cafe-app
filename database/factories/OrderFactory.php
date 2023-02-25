<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            //
            "item_id" => fake()->numberBetween(1, 15),
            "table_id" => fake()->numberBetween(1, 5),
            "quantity" => fake()->numberBetween(1, 3),
        ];
    }
}
