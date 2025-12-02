<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();

            // Datos básicos
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('dni', 20)->unique();

            // Información opcional
            $table->string('email')->nullable()->unique();
            $table->string('telefono', 30)->nullable();

            // Información académica
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
