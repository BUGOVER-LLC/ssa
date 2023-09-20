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
        Schema::connection('pgsql_app')->create('workspaces', function (Blueprint $table) {
            $table->id('workspace_id')->index('workspace_index_id');
            $table->unsignedBigInteger('creator_id')->index('workspace_index_creator_id');
            $table->uuid('uid')->index('workspace_index_uid');
            $table->string('name', '500')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('workspaces');
    }
};
