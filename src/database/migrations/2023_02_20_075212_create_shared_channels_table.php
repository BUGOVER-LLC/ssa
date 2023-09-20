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
        Schema::connection('pgsql_app')->create('shared_channels', static function (Blueprint $table) {
            $table->id('shared_channel_id')->index('shared_channels_index_shared_channel_id');
            $table->unsignedBigInteger('channel_id')->index('shared_channels_index_channel_id');
            $table->unsignedBigInteger('workspace_id')->index('shared_channels_index_workspace_id');
            $table->unsignedBigInteger('target_id')->index('shared_channels_index_target_id');
            $table->uuid('uid')->index('shared_channels_index_uid');
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('shared_channels');
    }
};
