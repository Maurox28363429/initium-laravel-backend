<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariocoordinadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horariocoordinadors', function (Blueprint $table) {
            $table->id(); 
            $table->date('fecha');
            $table->time('init_hora');
            $table->time('end_hora');
            $table->string('tipo');
            $table->bigInteger('coordinador_id')->nullable()->unsigned();
            $table->foreign('coordinador_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horariocoordinadors');
    }
}