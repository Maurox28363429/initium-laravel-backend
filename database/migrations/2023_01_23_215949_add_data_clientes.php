<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string("occupation",250)->nullable();
            $table->string("objectives",250)->nullable();
            $table->string("dni");
            $table->string("nickname",250)->nullable();
            $table->string("place_work",250)->nullable();
            $table->string("referrals_code",250)->nullable();
            $table->string("question_1",250)->nullable();
            $table->string("question_2",250)->nullable();
            $table->string("note_1",250)->nullable();
            $table->string("note_2",250)->nullable();
            $table->string("sexo",20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
}
