<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'codigo', 'nombre', 'descripcion', 
        'creditos', 'semestre', 'docente_id'
    ];
    
    public function docente() {
        return $this->belongsTo(Docente::class);
    }
    
    public function horarios() {
        return $this->hasMany(Horario::class);
    }
}