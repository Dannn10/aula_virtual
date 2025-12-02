<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->enum('estado', ['encendido', 'apagado', 'mantenimiento'])->default('apagado');
            $table->integer('temperatura')->default(22);
            $table->enum('modo', ['frio', 'calor', 'ventilador'])->default('frio');
            $table->enum('velocidad', ['baja', 'media', 'alta'])->default('media');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aire_acondicionados');
    }
};