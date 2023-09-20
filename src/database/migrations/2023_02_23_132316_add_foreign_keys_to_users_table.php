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
        Schema::connection('pgsql_app')->table('users', function (Blueprint $table) {
            $table
                ->foreign('current_workspace_id', 'users_foreign_current_workspace_id')
                ->references('workspace_id')
                ->on('workspaces')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('current_device_id', 'users_foreign_current_device_id')
                ->references('device_id')
                ->on('devices')
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
        Schema::connection('pgsql_app')->table('users', function (Blueprint $table) {
            $table->dropForeign('users_foreign_current_workspace_id');
            $table->dropForeign('users_foreign_current_device_id');
        });
    }
};
