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
        Schema::connection('pgsql_app')->create('board_tasks', static function (Blueprint $table) {
            $table->id('board_task_id')->index('board_tasks_index_board_task_id');

            $table->unsignedBigInteger('stape_id')->index('board_tasks_index_stape_id');
            $table->unsignedBigInteger('creator_id')->index('board_tasks_index_creator_id');
            $table->unsignedBigInteger('channel_id')->nullable()->index('board_tasks_index_channel_id');
            $table->string('title')->index('board_tasks_index_title');
            $table->jsonb('body')->index('board_tasks_index_body');
            $table->boolean('assigned')->default(false);
            $table->enum('status', ['']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('board_tasks');
    }
};
