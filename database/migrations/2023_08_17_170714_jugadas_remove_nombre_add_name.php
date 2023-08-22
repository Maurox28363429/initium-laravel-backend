<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JugadasRemoveNombreAddName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jugadas_enrrolamientos', function (Blueprint $table) {
            $table->dropColumn('nombre');
            $table->string('name',250)->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jugadas_enrrolamientos', function (Blueprint $table) {
            //
        });
    }
}
