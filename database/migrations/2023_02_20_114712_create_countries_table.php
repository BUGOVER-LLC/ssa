<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('pgsql_app')->create('countries', function (Blueprint $table) {
            $table->id('country_id');

            $table->char('iso', 2);
            $table->char('iso3', 3);
            $table->string('name', 80);
            $table->string('nice_name', 80);
            $table->unsignedTinyInteger('phone_code');
            $table->string('phone_mask', 32);
            $table->string('currency', 50);
            $table->string('flag', 30);

            $table->timestamp('created_at')->default(DB::raw('current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_app')->dropIfExists('countries');
    }
};
