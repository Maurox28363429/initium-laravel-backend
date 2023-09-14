<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formaspagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 200);
            $table->text('client_key')->nullable();
            $table->text('secret_key')->nullable();
            $table->boolean('automatica')->default(1);
            $table->text('descripcion')->nullable();
            $table->foreignId('edificios_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formaspagos');
    }
};
