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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->enum('whatsapp_notification', ['on', 'off'])->default('on');
            $table->enum('email_notification', ['on', 'off'])->default('on');
            $table->enum('allow_whatsapp_chat', ['on', 'off'])->default('on');
            $table->enum('web_notification', ['on', 'off'])->default('on');      
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
