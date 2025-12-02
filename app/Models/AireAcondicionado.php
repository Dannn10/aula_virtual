<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
    use HasFactory;

    protected $table = 'aire_acondicionados'; // Especificar el nombre de la tabla

    protected $fillable = [
        'nombre',
        'aula_id',
        'marca',
        'modelo',
        'estado',
        'temperatura',
        'modo',
        'velocidad'
    ];

    // Relación con el aula (si existe)
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}