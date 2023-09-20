<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::connection('pgsql_app')->create('user_device', function (Blueprint $table) {
            $table->id('user_device_id')->index('user_device_index_user_device_id');

            $table->unsignedBigInteger('user_id')->index('user_device_index_user_id');
            $table->unsignedBigInteger('device_id')->index('user_device_index_device_id');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('user_device');
    }
};
