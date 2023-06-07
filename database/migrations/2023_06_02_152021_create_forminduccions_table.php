<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForminduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forminduccions', function (Blueprint $table) {
            $table->id();
                $table->bigInteger('user_id')->nullable()->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
                
                $table->text("question_1")->nullable();
                $table->text("question_2")->nullable();
                $table->text("question_3")->nullable();
                $table->text("question_4")->nullable();
                $table->text("question_5")->nullable();
                $table->text("question_6")->nullable();
                
                $table->text("objective_1")->nullable();
                $table->text("objective_2")->nullable();
                $table->text("objective_3")->nullable();
                
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
        Schema::dropIfExists('forminduccions');
    }
}
