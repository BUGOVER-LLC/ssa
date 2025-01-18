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
        Schema::table('personal_participants', function (Blueprint $table) {
            $table
                ->foreign('personal_id', 'personal_participants_foreign_personal_id')
                ->references('personal_message_id')
                ->on('personal_messages')
                ->onUpdate('NO ACTION')
                ->onDelete('CASCADE');

            $table
                ->foreign('participant_id', 'personal_participants_foreign_participant_id')
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
        Schema::table('personal_participants', function (Blueprint $table) {
            $table->dropForeign('personal_participants_foreign_personal_id');
            $table->dropForeign('personal_participants_foreign_participant_id');
        });
    }
};
