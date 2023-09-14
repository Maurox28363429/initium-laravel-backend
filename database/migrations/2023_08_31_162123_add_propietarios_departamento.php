<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropietariosDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departamentos', function (Blueprint $table) {
            $table->bigInteger('propietario_principal_id')->unsigned()->nullable();
            $table->foreign('propietario_principal_id')->references('id')->on('users');

            $table->bigInteger('propietario_secundario_id')->unsigned()->nullable();
            $table->foreign('propietario_secundario_id')->references('id')->on('users');

            $table->bigInteger('inquilino_id')->unsigned()->nullable();
            $table->foreign('inquilino_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departamentos', function (Blueprint $table) {
            //
        });
    }
}
