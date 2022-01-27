<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;
    protected $table = 'centros_consumo_horarios';
    protected $fillable = [
        'centro_consumo_id', 'dia', 'hora_inicio', 'hora_final'
    ];
}
