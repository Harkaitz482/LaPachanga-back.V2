<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartidoHasEquipo extends Model
{
    use HasFactory;

    protected $table = 'partidoEquipo';
    protected $primaryKey = 'idPartidos_has_equipos';
    protected $fillable = ['partidos_idPartidos', 'equipos_idequipos'];

    public function partido()
    {
        return $this->belongsTo(Partido::class, 'partidos_idPartidos');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipos_idequipos');
    }

    public function apuestas()
    {
        return $this->hasMany(Apuesta::class, 'Partidos_has_equipos_Partidos_idPartidos', 'partidos_idPartidos');
    }
}
