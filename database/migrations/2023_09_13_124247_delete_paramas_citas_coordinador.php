<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteParamasCitasCoordinador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citascoordinadors', function (Blueprint $table) {
            $table->dropColumn('fecha');
            $table->dropColumn('init_hora');
            $table->dropColumn('end_hora');
            $table->dropColumn('tipo');
            $table->dropColumn('estado');
            $table->bigInteger('horario_id')->nullable()->unsigned();
            $table->foreign('horario_id')->references('id')->on('horariocoordinadors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citascoordinadors', function (Blueprint $table) {
            //
        });
    }
}
