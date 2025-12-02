<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'codigo', 'nombre', 'apellido', 'email',
        'telefono', 'departamento', 'estado'
    ];
    
    public function materias() {
        return $this->hasMany(Materia::class);
    }
    
    public function horarios() {
        return $this->hasMany(Horario::class);
    }
}