<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_cursos', function (Blueprint $table) {
            $table->id();
            $table->text('img')->nullable();
            $table->double('precio',30,2)->default(0);
            $table->string('nombre')->nullable();
            $table->integer('calificacion')->default(0);
            $table->text('descripcion')->nullable();
            $table->text('link')->nullable();
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
        Schema::dropIfExists('planes_cursos');
    }
}
