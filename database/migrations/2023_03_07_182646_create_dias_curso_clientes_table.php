<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasCursoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_curso_clientes', function (Blueprint $table) {
            $table->id();
                $table->bigInteger('client_id')->nullable()->unsigned();
                $table->foreign('client_id')->references('id')->on('clientes');

                $table->boolean('llego')->default(false);

                $table->bigInteger('curso_id')->nullable()->unsigned();
                $table->foreign('curso_id')->references('id')->on('cursos');

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
        Schema::dropIfExists('dias_curso_clientes');
    }
}
