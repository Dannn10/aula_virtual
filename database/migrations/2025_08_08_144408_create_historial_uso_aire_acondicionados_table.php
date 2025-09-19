<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_uso_aires', function (Blueprint $table) {
    $table->id();
    $table->foreignId('aires_acondicionado_id')->constrained('aires_acondicionados');
    $table->dateTime('fecha');
    $table->string('accion'); // encendido / apagado
    $table->integer('temperatura')->nullable();
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
        Schema::dropIfExists('historial_uso_aire_acondicionados');
    }
};
