<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('last_name', 200);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->date('birth_date')->nullable();
            $table->string('nacionalidad', 100)->nullable();
            $table->string('civil_status', 100)->nullable();
            $table->string('pais', 100)->default("Panamá");
            $table->boolean('accept_contract')->default(false);
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
        Schema::dropIfExists('clientes');
    }
}
