<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitascoordinadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citascoordinadors', function (Blueprint $table) {
            $table->id(); 

            $table->bigInteger('participante_id')->nullable()->unsigned();
            $table->foreign('participante_id')->references('id')->on('users');

            $table->bigInteger('coordinador_id')->nullable()->unsigned();
            $table->foreign('coordinador_id')->references('id')->on('users');

            $table->date('fecha');
            $table->time('init_hora');
            $table->time('end_hora');
            $table->string('tipo');
            $table->string('estado')->default('pendiente');
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
        Schema::dropIfExists('citascoordinadors');
    }
}
