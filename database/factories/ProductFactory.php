<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'mitra_id' => User::where('role', 'Mitra')->inRandomOrder()->firstOrFail()->id,
            'name_product' => fake()->name(),
            'description' => fake()->paragraph(30),
            'stock' => fake()->numberBetween(0,100),
            'product_point' =>fake()->numberBetween(1000,3000)
        ];
    }
}
