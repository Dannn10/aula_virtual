<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialUsoAireAcondicionado extends Model
{
    use HasFactory;

    protected $table = 'historial_uso_aire_acondicionados';

    protected $fillable = [
        'aire_acondicionado_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'temperatura_inicial',
        'temperatura_final',
        'modo',
        'velocidad',
        'consumo_energia',
        'duracion_minutos',
        'usuario_id'
    ];

    // Relación con el aire acondicionado
    public function aireAcondicionado()
    {
        return $this->belongsTo(AireAcondicionado::class, 'aire_acondicionado_id');
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}