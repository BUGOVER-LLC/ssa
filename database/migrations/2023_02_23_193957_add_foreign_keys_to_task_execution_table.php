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
        Schema::table('task_execution', function (Blueprint $table) {
            $table
                ->foreign('task_id', 'task_execution_foreign_task_id')
                ->references('board_task_id')
                ->on('board_tasks')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('executor_id', 'task_execution_foreign_executor_id')
                ->references('user_id')
                ->on('users')
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
        Schema::table('task_execution', function (Blueprint $table) {
            $table->dropForeign('task_execution_foreign_executor_id');
        });
    }
};
