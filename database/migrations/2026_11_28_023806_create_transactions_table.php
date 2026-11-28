<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('invoice_number')->unique(); // Contoh: TRX-2026-101
        $table->string('type'); // Penjualan Eceran, Grosir Bengkel, Servis Bengkel
        $table->string('customer_name');
        $table->integer('total_amount');
        $table->integer('paid_amount');
        $table->integer('change_amount');
        $table->timestamps();
    });
}
};
