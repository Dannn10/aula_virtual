<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    use HasFactory;

    protected $table = 'disponibilidades'; // ← AGREGA ESTO

    protected $fillable = ['aula_id', 'dia', 'hora_inicio', 'hora_fin'];
}
