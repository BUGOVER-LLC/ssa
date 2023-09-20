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
        Schema::connection('pgsql_app')->table('board_tasks', static function (Blueprint $table) {
            $table
                ->foreign('stape_id', 'board_tasks_foreign_stape_id')
                ->references('board_stape_id')
                ->on('board_stapes')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('creator_id', 'board_tasks_foreign_creator_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('channel_id', 'board_tasks_foreign_channel_id')
                ->references('channel_id')
                ->on('channels')
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
        Schema::connection('pgsql_app')->table('board_tasks', function (Blueprint $table) {
            $table->dropForeign('board_tasks_foreign_stape_id');
            $table->dropForeign('board_tasks_foreign_creator_id');
            $table->dropForeign('board_tasks_foreign_channel_id');
        });
    }
};
