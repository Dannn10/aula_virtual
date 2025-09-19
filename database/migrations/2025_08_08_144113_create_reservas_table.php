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
       Schema::create('reservas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('aula_id')->constrained();
    $table->foreignId('materia_id')->constrained();
    $table->foreignId('docente_id')->constrained();
    $table->dateTime('fecha_inicio');
    $table->dateTime('fecha_fin');
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
        Schema::dropIfExists('reservas');
    }
};
