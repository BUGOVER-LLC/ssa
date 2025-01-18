<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id')->index('users_index_user_id');

            $table->unsignedBigInteger('current_workspace_id')->nullable()->index('users_index_current_workspace_id');
            $table->unsignedBigInteger('current_device_id')->nullable()->index('users_index_current_device_id');
            $table->uuid('uid')->unique();
            $table->string('name', 150)->nullable()->unique();
            $table->string('phone', 32)->nullable()->unique();
            $table->string('email', 250)->unique();
            $table->string('password');
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
