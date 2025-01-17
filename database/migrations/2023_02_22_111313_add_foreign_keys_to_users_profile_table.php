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
        Schema::connection('pgsql_app')->table('users_profile', static function (Blueprint $table) {
            $table
                ->foreign('user_id', 'users_profile_foreign_user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('country_id', 'users_profile_foreign_country_id')
                ->references('country_id')
                ->on('countries')
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
        Schema::connection('pgsql_app')->table('users_profile', function (Blueprint $table) {
            $table->dropForeign('users_profile_foreign_user_id');
            $table->dropForeign('users_profile_foreign_country_id');
        });
    }
};
