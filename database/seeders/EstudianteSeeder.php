<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudiante;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        Estudiante::factory()->count(20)->create();
    }
}
