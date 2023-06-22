<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_segs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('curso_id')->nullable()->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
            
            $table->text("interpersonalObjectives1")->nullable();
            $table->text("interpersonalObjectives2")->nullable();
            $table->text("professionalObjectives1")->nullable();
            $table->text("professionalObjectives2")->nullable();
            $table->text("objectiveInTheCommunity1")->nullable();
            $table->text("objectiveInTheCommunity2")->nullable();
            
            $table->integer("recursante")->default(0);
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
        Schema::dropIfExists('form_segs');
    }
}
