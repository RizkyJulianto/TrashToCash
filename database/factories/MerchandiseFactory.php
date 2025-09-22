<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchandise>
 */
class MerchandiseFactory extends Factory
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
            'nama_produk' => fake()->name(),
            'deskripsi' => fake()->paragraph(30),
            'stok' => fake()->numberBetween(0,100),
            'merchandise_point' =>fake()->numberBetween(1000,3000)
        ];
    }
}
