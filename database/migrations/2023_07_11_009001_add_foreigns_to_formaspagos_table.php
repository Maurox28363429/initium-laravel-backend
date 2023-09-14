<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('formaspagos', function (Blueprint $table) {
            $table
                ->foreign('edificios_id')
                ->references('id')
                ->on('edificios')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formaspagos', function (Blueprint $table) {
            $table->dropForeign(['edificios_id']);
        });
    }
};
