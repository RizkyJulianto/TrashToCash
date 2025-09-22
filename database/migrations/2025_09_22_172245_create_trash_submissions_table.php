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
        Schema::create('trash_submissions', function (Blueprint $table) {
            $table->id();
             $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tps_id')->constrained('tps')->onDelete('cascade');
            $table->enum('jenis_sampah',['Plastik','Kaca','Kaleng','Kardus','Botol']);
            $table->decimal('berat');
            $table->string('gambar')->nullable();
            $table->decimal('point_reward');
            $table->date('tgl_transaksi');
            $table->enum('status',['Pending','Sukses','Gagal']);
            $table->string('qrcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash_submissions');
    }
};
