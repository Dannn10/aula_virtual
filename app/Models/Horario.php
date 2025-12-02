<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'aula_id', 'materia_id', 'docente_id',
        'dia_semana', 'hora_inicio', 'hora_fin',
        'seccion', 'periodo'
    ];
    
    protected $casts = [
        'hora_inicio' => 'time',
        'hora_fin' => 'time'
    ];
    
    public function aula() {
        return $this->belongsTo(Aula::class);
    }
    
    public function materia() {
        return $this->belongsTo(Materia::class);
    }
    
    public function docente() {
        return $this->belongsTo(Docente::class);
    }
}