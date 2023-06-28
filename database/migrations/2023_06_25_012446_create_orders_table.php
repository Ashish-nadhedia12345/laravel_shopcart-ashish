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
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
                $table->foreignId('address_id')->references('id')->on('addresses')->cascadeOnDelete();
                $table->integer('amount');
                $table->string('payment_status')->default('unpaid');
                $table->string('order_status')->default('inprogress');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
