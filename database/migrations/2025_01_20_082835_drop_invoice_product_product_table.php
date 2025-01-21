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
        Schema::dropIfExists('invoice_product_product');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('invoice_product_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ProductID')->constrained('products')->onDelete('cascade');
            $table->foreignId('InvoiceProductID')->constrained('invoice_products')->onDelete('cascade');
            $table->timestamps();
        });
    }
};
