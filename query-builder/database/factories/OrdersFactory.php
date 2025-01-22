<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orders>
 */
class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'product' => implode(' ',fake()->words(2)),
            'quantity' => fake()->numberBetween(1,20),
            'total' => fake()->randomFloat(2,5,100),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
