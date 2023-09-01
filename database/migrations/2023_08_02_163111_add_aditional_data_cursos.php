<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAditionalDataCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('num_declaracion')->unsigned()->nullable();
            $table->integer('num_cumplimiento_declaracion')->unsigned()->nullable();
            $table->text('cancion_gol')->nullable();
            $table->text('mision_gol')->nullable();
            $table->boolean('gol_active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            //
        });
    }
}
