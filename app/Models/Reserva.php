<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'docente_id',
        'aula_id',
        'materia_id',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Esto permite que al usar ->fecha_inicio sea Carbon
    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];

    // relaciones...
    public function docente() { return $this->belongsTo(Docente::class); }
    public function aula()    { return $this->belongsTo(Aula::class); }
    public function materia() { return $this->belongsTo(Materia::class); }
}
