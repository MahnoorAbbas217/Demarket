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
        Schema::create('item_additional_informations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->string('title');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_additional_informations');
    }
};
