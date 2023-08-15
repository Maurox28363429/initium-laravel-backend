<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursovotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursovotos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('votacion_id')->nullable()->unsigned();
            $table->foreign('votacion_id')->references('id')->on('cursovotaciones');

            $table->bigInteger('seleccion_1')->nullable()->unsigned();
            $table->bigInteger('seleccion_2')->nullable()->unsigned();
            $table->bigInteger('seleccion_3')->nullable()->unsigned();

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
        Schema::dropIfExists('cursovotos');
    }
}
