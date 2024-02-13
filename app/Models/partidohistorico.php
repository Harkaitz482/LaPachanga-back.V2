<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partidohistorico extends Model
{
    use HasFactory;

    protected $fillable = [
        'partido_id',
        'mapa',
        'arbitro',
        'equipo_id',
        'equipo2_id',
        'fecha',
        'hora',
        'puntuacion',
        'liga_id',
        'tipo_operacion', // Asegúrate de incluir campos nuevos aquí
    ];
}
