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
        Schema::connection('pgsql_app')->create('workers', function (Blueprint $table) {
            $table->id('worker_id')->index('workers_index_worker_id');
            $table->unsignedBigInteger('workspace_id')->index('workers_index_workspace_id');
            $table->unsignedBigInteger('user_id')->index('workers_index_user_id');
            $table->timestamp('created_id')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('workers');
    }
};
