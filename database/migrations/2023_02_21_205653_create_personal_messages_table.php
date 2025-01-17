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
        Schema::connection('pgsql_app')->create('personal_messages', function (Blueprint $table) {
            $table->id('personal_message_id')->index('personal_messages_index_personal_message_id');

            $table->unsignedBigInteger('author_id')->index('personal_messages_index_author_id');
            $table->unsignedBigInteger('participant_id')->index('personal_messages_index_participant_id');
            $table->unsignedBigInteger('workspace_id')->index('personal_messages_index_workspace_id');
            $table->unsignedBigInteger('parent_id')->index('personal_messages_index_parent_id')->nullable();
            $table->json('body')->fulltext('personal_messages_fulltext_body');
            $table->boolean('viewed')->default(false);
            $table->dateTime('viewed_at')->nullable();

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
        Schema::connection('pgsql_app')->dropIfExists('personal_messages');
    }
};
