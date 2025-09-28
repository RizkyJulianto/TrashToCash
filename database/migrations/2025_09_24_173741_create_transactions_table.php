<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tps_id')->nullable()->constrained('tps')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->enum('type', ['Sampah', 'Barang', 'Tunai']);
            $table->enum('type_bank', ['BRI', 'BCA', 'Mandiri']);
            $table->enum('type_wallet', ['DANA', 'OVO', 'Gopay']);
            $table->string('phone_number')->nullable();
            $table->integer('bank_number')->nullable();
            $table->enum('trash', ['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol']);
            $table->decimal('weight')->nullable();
            $table->string('photo')->nullable();
            $table->decimal('points')->nullable();
            $table->text('description')->nullable();
            $table->decimal('totals')->nullable();
            $table->enum('status', ['Pending', 'Sukses', 'Gagal', 'Dibatalkan']);
            $table->string('qrcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
