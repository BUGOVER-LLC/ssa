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
        Schema::connection('pgsql_app')->create('messages', function (Blueprint $table) {
            $table->id('message_id')->index('messages_index_message_id');
            $table->unsignedBigInteger('workspace_id')->index('messages_index_workspace_id');
            $table->unsignedBigInteger('channel_id')->index('messages_index_channel_id');
            $table->unsignedBigInteger('author_id')->index('messages_index_author_id');
            $table->unsignedBigInteger('parent_id')->index('messages_index_parent_id');
            $table->json('body')->fulltext('messages_fulltext_body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('messages');
    }
};
