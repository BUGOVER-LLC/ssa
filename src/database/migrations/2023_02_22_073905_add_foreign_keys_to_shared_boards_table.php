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
        Schema::connection('pgsql_app')->table('shared_boards', function (Blueprint $table) {
            $table
                ->foreign('board_id', 'shared_boards_foreign_board_id')
                ->references('board_id')
                ->on('boards')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('workspace_id', 'shared_boards_foreign_workspace_id')
                ->references('workspace_id')
                ->on('workspaces')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('target_id', 'shared_boards_foreign_target_id')
                ->references('workspace_id')
                ->on('workspaces')
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
        Schema::connection('pgsql_app')->table('shared_boards', static function (Blueprint $table) {
            $table->dropForeign('shared_boards_foreign_board_id');
            $table->dropForeign('shared_boards_foreign_workspace_id');
            $table->dropForeign('shared_boards_foreign_target_id');
        });
    }
};
