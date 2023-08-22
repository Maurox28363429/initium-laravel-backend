<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadasEnrrolamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadas_enrrolamientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',250);
            $table->string('descripcion',250);
            $table->string('parentesco',250);
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
        Schema::dropIfExists('jugadas_enrrolamientos');
    }
}
