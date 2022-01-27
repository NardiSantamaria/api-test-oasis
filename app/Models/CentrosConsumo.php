<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentrosConsumo extends Model
{
    use HasFactory;
    protected $table = 'centros_consumo';
    protected $fillable = [
        'nombre', 'concepto_es', 'logo', 'img_portada', 'categoria_id'
    ];
}
