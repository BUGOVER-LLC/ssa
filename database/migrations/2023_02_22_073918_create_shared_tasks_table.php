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
        Schema::create('shared_tasks', static function (Blueprint $table) {
            $table->id('shared_task_id')->index('shared_tasks_index_shared_task_id');

            $table->unsignedBigInteger('task_id')->index('shared_tasks_index_task_id');
            $table->unsignedBigInteger('board_id')->index('shared_tasks_index_board_id');
            $table->unsignedBigInteger('target_id')->index('shared_tasks_index_target_id');

            $table->string('title', 300);

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
        Schema::dropIfExists('shared_tasks');
    }
};
