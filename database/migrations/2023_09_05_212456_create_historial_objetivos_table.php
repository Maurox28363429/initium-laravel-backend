<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_objetivos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('curso_id')->nullable()->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');

            $table->string('objetiveOne',250)->nullable();
            $table->string('howToMeasureOne',250)->nullable();
            $table->string('whyOne',250)->nullable();
            $table->string('howToCelebrateOne',250)->nullable();
            $table->double('percentageOne',30,2);
            $table->boolean('approvedOne')->default(false);

            $table->string('objetiveTwo',250)->nullable();
            $table->string('howToMeasureTwo',250)->nullable();
            $table->string('whyTwo',250)->nullable();
            $table->string('howToCelebrateTwo',250)->nullable();
            $table->double('percentageTwo',30,2);
            $table->boolean('approvedTwo')->default(false);

            $table->string('objetiveThree',250)->nullable();
            $table->string('howToMeasureThree',250)->nullable();
            $table->string('whyThree',250)->nullable();
            $table->string('howToCelebrateThree',250)->nullable();
            $table->double('percentageThree',30,2);
            $table->boolean('approvedThree')->default(false);

            $table->text('comment')->nullable();
            $table->text('comment2')->nullable();
            $table->text('comment3')->nullable();
            $table->boolean('approved')->default(false);
            
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
        Schema::dropIfExists('historial_objetivos');
    }
}
