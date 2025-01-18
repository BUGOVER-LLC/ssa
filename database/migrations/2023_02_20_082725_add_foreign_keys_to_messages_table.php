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
        Schema::table('messages', function (Blueprint $table) {
            $table
                ->foreign('workspace_id', 'messages_foreign_workspace_id')
                ->references('workspace_id')
                ->on('workspaces')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('channel_id', 'messages_foreign_channel_id')
                ->references('channel_id')
                ->on('channels')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('author_id', 'messages_foreign_author_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('parent_id', 'messages_foreign_parent_id')
                ->references('message_id')
                ->on('messages')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_foreign_workspace_id');
            $table->dropForeign('messages_foreign_channel_id');
            $table->dropForeign('messages_foreign_author_id');
            $table->dropForeign('messages_foreign_parent_id');
        });
    }
};
