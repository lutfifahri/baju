<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->string('stock_in')->nullable();
            $table->string('stock_out')->nullable();
            $table->string('current_stock')->nullable();
            $table->enum('transaction_type', ['penjualan', 'pembelian', 'penyesuaian'])->default('penjualan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
