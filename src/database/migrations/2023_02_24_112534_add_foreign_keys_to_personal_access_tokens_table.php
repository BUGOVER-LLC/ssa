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
        Schema::connection('pgsql_app')->table('personal_access_tokens', function (Blueprint $table) {
            $table
                ->foreign('user_id', 'personal_access_tokens_foreign_user_id')
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
        Schema::connection('pgsql_app')->table('personal_access_tokens', function (Blueprint $table) {
            $table->dropForeign('personal_access_tokens_foreign_user_id');
        });
    }
};
