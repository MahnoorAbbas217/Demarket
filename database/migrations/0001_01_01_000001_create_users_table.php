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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('google_id')->nullable();
            $table->foreignUuid('membership_id')->default(1);
            $table->string('store_slug');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_no')->unique();
            $table->timestamp('mobile_no_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image')->default('uploads/user/user-default.png');
            $table->string('city_name');
            $table->longText('shipping_address')->nullable();
            $table->longText('personal_address')->nullable();
            $table->string('cnic_front_copy')->nullable();
            $table->string('cnic_back_copy')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->timestamp('identity_verified_at')->nullable();
            $table->enum('publication_status', ['active', 'inactive', 'blocked'])->default('active');
            $table->enum('created_from', ['web', 'app', 'other'])->default('web');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUuid('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
