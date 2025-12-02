<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial_uso_aire_acondicionados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aire_acondicionado_id')->constrained()->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin')->nullable();
            $table->integer('temperatura_inicial');
            $table->integer('temperatura_final')->nullable();
            $table->enum('modo', ['frio', 'calor', 'ventilador'])->default('frio');
            $table->enum('velocidad', ['baja', 'media', 'alta'])->default('media');
            $table->decimal('consumo_energia', 8, 2)->nullable();
            $table->integer('duracion_minutos')->nullable();
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_uso_aire_acondicionados');
    }
};