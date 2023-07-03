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
        Schema::table("orders", function(Blueprint $table){
            $table->string("coupon_title")->nullable(true);
            $table->string("coupon_code")->nullable(true);
            $table->string("coupon_type")->nullable(true);
            $table->float("coupon_amount")->nullable(true);
            $table->float("discounted_amount")->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
