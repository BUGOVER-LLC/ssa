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
        Schema::connection('pgsql_app')->table('participants', function (Blueprint $table) {
            $table
                ->foreign('channel_id', 'participants_foreign_channel_id')
                ->references('channel_id')
                ->on('channels')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id', 'participants_foreign_user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->table('participants', function (Blueprint $table) {
            $table->dropForeign('participants_foreign_channel_id');
            $table->dropForeign('participants_foreign_user_id');
        });
    }
};
