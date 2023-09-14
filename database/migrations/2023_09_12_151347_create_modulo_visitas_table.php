<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuloVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_visitas', function (Blueprint $table) {
            $table->uuid('uid')->primary();
            $table->bigInteger("apartamentID")->unsigned()->nullable();
            $table->foreign("apartamentID")->references("id")->on("departamentos")->onDelete("set null");
            $table->string('apartamentName');
            $table->date('Visit_Date');
            $table->time('Visit_Hour');
            $table->string('VisitorName');
            $table->string('VisitorLastName');
            $table->string('VisitorPhone');
            $table->text('VisitUrl')->nullable();
            $table->text('DNIURL')->nullable();
            $table->string('DNI');
            $table->text('QRUrl')->nullable();
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
        Schema::dropIfExists('modulo_visitas');
    }
}
