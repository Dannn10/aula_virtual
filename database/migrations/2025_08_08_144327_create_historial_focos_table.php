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
        Schema::create('historial_focos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('foco_id')->constrained();
    $table->dateTime('fecha');
    $table->string('accion'); // encendido o apagado
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
        Schema::dropIfExists('historial_focos');
    }
};
