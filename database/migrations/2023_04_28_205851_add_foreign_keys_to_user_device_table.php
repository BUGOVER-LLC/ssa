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
    public function up()
    {
        Schema::table('user_device', static function (Blueprint $table) {
            $table
                ->foreign('user_id', 'users_device_foreign_user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('device_id', 'users_device_foreign_current_device_id')
                ->references('device_id')
                ->on('devices')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('current_device_id', 'users_current_device_foreign_current_device_id')
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
        Schema::table('user_device', function (Blueprint $table) {
            $table->dropForeign('users_device_foreign_user_id');
            $table->dropForeign('users_device_foreign_current_device_id');
            $table->dropForeign('users_current_device_foreign_current_device_id');
        });
    }
};
