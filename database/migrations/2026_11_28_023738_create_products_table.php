<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('sku')->unique();
        $table->string('name');
        $table->string('category'); // Sparepart Motor, Peralatan Bengkel, Aksesoris
        $table->integer('cost_price')->default(0);      // Harga Modal
        $table->integer('retail_price')->default(0);    // Harga Eceran
        $table->integer('wholesale_price')->default(0); // Harga Grosir
        $table->integer('stock')->default(0);           // Jumlah Stok
        $table->integer('min_stock')->default(5);       // Batas Minimum Stok
        $table->string('unit')->default('Pcs');         // Satuan (Pcs, Unit, Botol, Set)
        $table->timestamps();
    });
}
};
