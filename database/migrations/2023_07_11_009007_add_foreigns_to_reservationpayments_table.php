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
        Schema::table('reservationpayments', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('formaspago_id')
                ->references('id')
                ->on('formaspagos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('reservation_id')
                ->references('id')
                ->on('reservations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservationpayments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['formaspago_id']);
            $table->dropForeign(['reservation_id']);
        });
    }
};
