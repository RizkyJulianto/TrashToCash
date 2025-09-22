<?php

namespace Database\Factories;

use App\Models\Tps;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrashSubmission>
 */
class TrashSubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => User::where('role', 'User')->inRandomOrder()->firstOrFail()->id,
            'tps_id' => Tps::inRandomOrder()->firstOrFail()->id,
            'jenis_sampah' => fake()->randomElement(['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol']),
            'berat' => fake()->numberBetween(0.1, 20.5),
            'point_reward' => fake()->numberBetween(100, 5000),  
            'tgl_transaksi' => fake()->date(),
            'status' => fake()->randomElement(['Pending', 'Sukses', 'Gagal'])
        ];
    }
}
