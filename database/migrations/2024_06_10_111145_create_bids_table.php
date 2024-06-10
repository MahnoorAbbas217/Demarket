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
        Schema::create('bids', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->longText('item_detail')->nullable(); 
            $table->string('orignal_price');
            $table->string('bid_price'); 
            $table->enum('bid_status', ['pending', 'accepted', 'rejected', 'appected_and_paid'])->default('pending');        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
