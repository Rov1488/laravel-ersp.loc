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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->constrained()->onDelete('cascade');
            $table->string('product_name', 255);
            $table->string('slug', 255)->unique();
            $table->string('language', 6);
            $table->float('price', 8, 2);
            $table->float('old_price', 8, 2)->nullable();
            $table->integer('qty')->unsigned();
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('sale')->default(0);
            $table->integer('hit')->default(0);
            $table->integer('new')->default(0);
            $table->integer('bestseller')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
