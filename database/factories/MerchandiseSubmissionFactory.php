<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MerchandiseSubmission>
 */
class MerchandiseSubmissionFactory extends Factory
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
            'merchandise_id' => Merchandise::inRandomOrder()->firstOrFail()->id,
            'tgl_transaksi' => fake()->date(),
            'status' => fake()->randomElement(['Pending', 'Sukses', 'Gagal'])

        ];
    }
}
