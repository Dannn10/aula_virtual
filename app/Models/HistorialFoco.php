<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{
    use HasFactory;

    protected $fillable = ['foco_id', 'fecha', 'estado'];
}
