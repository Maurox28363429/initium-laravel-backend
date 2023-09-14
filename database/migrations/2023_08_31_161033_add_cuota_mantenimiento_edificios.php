<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCuotaMantenimientoEdificios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edificios', function (Blueprint $table) {
            $table->string('cuota_method')->nullable();
            $table->double('cuota_price',30,2)->default(0);
            $table->double('departamento_price',30,2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edificios', function (Blueprint $table) {
            //
        });
    }
}