<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'aula_id', 'usuario_id', 'titulo', 'descripcion',
        'fecha', 'hora_inicio', 'hora_fin', 'estado',
        'tipo', 'recurrencia'
    ];
    
    public function aula() {
        return $this->belongsTo(Aula::class);
    }
    
    public function usuario() {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}