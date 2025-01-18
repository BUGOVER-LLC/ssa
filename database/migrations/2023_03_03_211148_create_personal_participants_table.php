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
        Schema::create('personal_participants', function (Blueprint $table) {
            $table->id('personal_participant_id')->index('personal_participants_index_personal_participant_id');

            $table->unsignedBigInteger('personal_id')->index('personal_participants_index_personal_id');
            $table->unsignedBigInteger('participant_id')->index('personal_participants_index_participant_id');

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
        Schema::dropIfExists('personal_participants');
    }
};
