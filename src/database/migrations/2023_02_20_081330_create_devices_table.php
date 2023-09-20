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
        Schema::connection('pgsql_app')->create('devices', function (Blueprint $table) {
            $table->id('device_id')->index('device_index_device_id');

            $table->string('name')->unique();
            $table->string('model', 60)->unique();
            $table->enum('type', ['phone', 'tablet', 'web', 'desktop']);

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
        Schema::connection('pgsql_app')->dropIfExists('devices');
    }
};
