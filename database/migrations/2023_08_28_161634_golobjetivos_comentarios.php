<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GolobjetivosComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('golobjetivos', function (Blueprint $table) {
            $table->text('comment2')->nullable();
            $table->text('comment3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('golobjetivos', function (Blueprint $table) {
            //
        });
    }
}
