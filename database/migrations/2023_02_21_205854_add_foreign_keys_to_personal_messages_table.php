<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection('pgsql_app')->table('personal_messages', function (Blueprint $table) {
            $table
                ->foreign('author_id', 'personal_messages_foreign_author_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('participant_id', 'personal_messages_foreign_participant_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('workspace_id', 'personal_messages_foreign_workspace_id')
                ->references('workspace_id')
                ->on('workspaces')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('parent_id', 'personal_messages_foreign_parent_id')
                ->references('personal_message_id')
                ->on('personal_messages')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->table('personal_messages', function (Blueprint $table) {
            $table->dropForeign('personal_messages_foreign_author_id');
            $table->dropForeign('personal_messages_foreign_participant_id');
            $table->dropForeign('personal_messages_foreign_workspace_id');
            $table->dropForeign('personal_messages_foreign_parent_id');
        });
    }
};
