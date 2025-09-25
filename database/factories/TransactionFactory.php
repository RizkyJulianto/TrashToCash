<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\Product;
use App\Models\Tps;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
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
            'product_id' => Product::inRandomOrder()->firstOrFail()->id,
            'type' => fake()->randomElement(['Sampah', 'Barang', 'Tunai']),
            'type_bank' => fake()->randomElement(['BRI', 'BCA', 'Mandiri']),
            'type_wallet' => fake()->randomElement(['DANA', 'OVO', 'Gopay']),
            'phone_number' => fake()->e164PhoneNumber(),
            'bank_number' => fake()->randomNumber(),
            'trash' => fake()->randomElement(['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol']),
            'weight' => fake()->numberBetween(0.1, 20.5),
            'points' => fake()->numberBetween(100, 5000),
            'description' => fake()->paragraph(),
            'totals' => fake()->randomNumber(),
            'status' => fake()->randomElement(['Pending', 'Sukses', 'Gagal'])
        ];
    }
}
