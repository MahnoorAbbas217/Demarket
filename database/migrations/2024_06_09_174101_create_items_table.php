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
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignUuid('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->string('item_title');
            $table->string('condition');
            $table->longText('condition_description')->nullable();
            $table->enum('sale_type', ['auction', 'buy_it_now']);
            $table->enum('auction_duration', ['1day', '3days', '7days', '10days', '15days', '20days'])->default('1day');
            $table->string('quantity')->default(1);
            $table->string('start_bidding_price')->nullable();
            $table->string('buy_it_now_price');
            $table->string('shipping_price')->nullable();
            $table->string('shipping_duration')->nullable();
            $table->longText('short_description')->nullable();
            $table->string('video_url')->nullable();
            $table->enum('promotion', ['yes', 'no'])->default('no');
            $table->string('promotion_price')->default(0);
            $table->timestamp('promotion_expiry')->nullable();
            $table->enum('publication_status', ['active', 'inactive', 'block'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
