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
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('type_bank', ['BRI', 'BCA', 'Mandiri'])->nullable()->change();
            $table->enum('type_wallet', ['DANA', 'OVO', 'Gopay'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('type_bank', ['BRI', 'BCA', 'Mandiri'])->nullable(false)->change();
            $table->enum('type_wallet', ['DANA', 'OVO', 'Gopay'])->nullable(false)->change();
        });
    }
};
