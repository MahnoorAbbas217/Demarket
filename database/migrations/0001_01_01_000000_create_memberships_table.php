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
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('allow_products_per_month')->default(5);
            $table->string('sale_commission')->default(0);
            $table->string('tax')->default(0);
            $table->string('transection_charges')->default(0);
            $table->string('other_charges')->default(0);
            $table->string('images_allow')->default(5);
            $table->enum('allow_product_video', ['yes', 'no'])->default('no');
            $table->string('withdraw_duration')->default(15);
            $table->enum('publication_status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
