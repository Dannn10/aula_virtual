<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{
    use HasFactory;

    protected $fillable = [
        'foco_id', 
        'fecha', 
        'hora',
        'estado',
        'aula',
        'foco',
        'evento', 
        'duracion',
        'consumo',
        'tipo'
    ];

    // Opcional: Si quieres formatear la fecha automáticamente
    protected $casts = [
        'fecha' => 'date',
    ];
}