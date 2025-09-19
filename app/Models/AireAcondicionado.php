<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id', 'estado'];
}
