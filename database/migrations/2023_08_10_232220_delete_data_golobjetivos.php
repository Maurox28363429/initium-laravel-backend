<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteDataGolobjetivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('golobjetivos', function (Blueprint $table) {
            $table->dropColumn([
                "objetivo_1",
                "valor_1",
                "avance_1",
                "objetivo_2",
                "valor_2",
                "avance_2",
                "objetivo_3",
                "valor_3",
                "avance_3"
            ]);
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
