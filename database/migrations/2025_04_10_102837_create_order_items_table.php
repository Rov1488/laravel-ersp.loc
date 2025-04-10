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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->constrained()->onDelete('cascade'); // Foreign key to orders table
            $table->unsignedBigInteger('product_id')->constrained()->onDelete('cascade'); // Foreign key to products table
            $table->integer('qty')->unsigned();
            $table->float('price', 8, 2);
            $table->float('total', 8, 2);
            $table->string('currency', 255);
            $table->string('product_name', 255);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_item');
    }
};
