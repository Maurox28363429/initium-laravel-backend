<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGolobjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('golobjetivos', function (Blueprint $table) {
            $table->id();

            $table->text('objetivo_1');
            $table->double('valor_1',30,2);
            $table->double('avance_1', 30, 2);

            $table->text('objetivo_2');
            $table->double('valor_2', 30, 2);
            $table->double('avance_2', 30, 2);

            $table->text('objetivo_3');
            $table->double('valor_3', 30, 2);
            $table->double('avance_3', 30, 2);

            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('golobjetivos');
    }
}
