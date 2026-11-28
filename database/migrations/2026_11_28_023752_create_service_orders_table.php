<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('service_orders', function (Blueprint $table) {
        $table->id();
        $table->string('wo_number')->unique(); // Contoh: WO-2026-001
        $table->string('customer_name');
        $table->string('customer_wa')->nullable();
        $table->string('bike_type');
        $table->string('plate_number');
        $table->string('mechanic_name');
        $table->text('complaint');
        $table->string('service_desc')->nullable();
        $table->integer('service_fee')->default(0);
        $table->enum('status', ['Menunggu', 'Dikerjakan', 'Selesai', 'Diambil'])->default('Menunggu');
        $table->timestamps();
    });
}
};
