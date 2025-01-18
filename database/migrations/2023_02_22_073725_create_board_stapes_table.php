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
        Schema::create('board_stapes', static function (Blueprint $table) {
            $table->id('board_stape_id')->index('board_stapes_index_board_stape_id');

            $table->unsignedBigInteger('board_id')->index('board_stapes_index_board_id');
            $table->string('name', 300)->index('board_stapes_index_name');

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
        Schema::dropIfExists('board_stapes');
    }
};
