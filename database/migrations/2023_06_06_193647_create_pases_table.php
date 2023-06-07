<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pases', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('curso_id')->nullable()->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->boolean('pase')->default(0);
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
        Schema::dropIfExists('pases');
    }
}
