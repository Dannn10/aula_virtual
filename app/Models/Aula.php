<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre', 
        'edificio',
        'piso',
        'capacidad',
        'tipo',
        'descripcion',
        'disponible',
        'equipamiento'
    ];

    protected $casts = [
        'disponible' => 'boolean',
        'equipamiento' => 'array'
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function scopeDisponibles($query)
    {
        return $query->where('disponible', true);
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->edificio} - {$this->nombre} (Piso {$this->piso})";
    }
}
