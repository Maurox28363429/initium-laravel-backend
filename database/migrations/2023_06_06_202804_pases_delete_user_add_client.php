<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PasesDeleteUserAddClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if (!Schema::hasColumn('pases', 'user_id')) {
            Schema::table('pases', function (Blueprint $table) {
                $table->dropForeign(['users']);
                $table->bigInteger('client_id')->nullable()->unsigned();
                $table->foreign('client_id')->references('id')->on('clientes');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pases', function (Blueprint $table) {
            //
        });
    }
}
