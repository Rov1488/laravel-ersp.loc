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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('qty')->unsigned();
            $table->float('summary', 8, 2);
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->string('address', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('zip', 255);
            $table->string('country', 255);
            $table->string('payment_method', 255);
            $table->string('payment_status', 255);
            $table->string('order_status', 255);
            $table->string('tracking_number', 255)->nullable();
            $table->string('shipping_method', 255);
            $table->string('shipping_cost', 255);
            $table->string('currency', 255);
            $table->string('user_agent', 255);
            $table->string('notes', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
