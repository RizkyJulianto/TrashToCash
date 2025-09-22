<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tps>
 */
class TpsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_tps' => fake()->name(),
            'alamat' => fake()->paragraph(70),
            'no_telp' => fake()->e164phoneNumber(),
        ];
    }
}
