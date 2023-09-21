<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteParamashorariocoordinadors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horariocoordinadors', function (Blueprint $table) {
            $table->dropColumn('init_hora');
            $table->dropColumn('end_hora');
            $table->dropColumn('tipo');
            $table->time('hora')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horariocoordinadors', function (Blueprint $table) {
            //
        });
    }
}
