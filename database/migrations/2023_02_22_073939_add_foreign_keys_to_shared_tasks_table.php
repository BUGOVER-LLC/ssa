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
        Schema::connection('pgsql_app')->table('shared_tasks', static function (Blueprint $table) {
            $table
                ->foreign('task_id', 'shared_tasks_foreign_task_id')
                ->references('board_task_id')
                ->on('board_tasks')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('board_id', 'shared_tasks_foreign_board_id')
                ->references('board_id')
                ->on('boards')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('target_id', 'shared_tasks_foreign_target_id')
                ->references('board_id')
                ->on('boards')
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
        Schema::connection('pgsql_app')->table('shared_tasks', static function (Blueprint $table) {
            $table->dropForeign('shared_tasks_foreign_task_id');
            $table->dropForeign('shared_tasks_foreign_board_id');
            $table->dropForeign('shared_tasks_foreign_target_id');
        });
    }
};
