<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulovotacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulovotaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('edificio_id')->unsigned()->nullable();
            $table->foreign('edificio_id')->references('id')->on('edificios');
            $table->string('titulo');
            $table->text('body')->nullable();
            $table->string('tipoDeEncuesta')->default('cerrada');
            $table->text('votantes_ids')->nullable();
            $table->text('preguntas')->nullable();
            $table->string('estado')->default('Activo');
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
        Schema::dropIfExists('modulovotaciones');
    }
}
