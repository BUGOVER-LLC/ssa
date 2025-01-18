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
        Schema::create('task_execution', function (Blueprint $table) {
            $table->id('task_execution_id')->index('task_execution_task_execution_id');

            $table->unsignedBigInteger('task_id')->index('task_execution_task_id');
            $table->unsignedBigInteger('executor_id')->index('task_execution_executor_id');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('task_execution');
    }
};
