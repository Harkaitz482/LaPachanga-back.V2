<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Apuesta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gasto',
        'ganancias',
        'fecha',
        'user_id',
        'sala_id',
        'equipo_id',
        'partido_id',
        'resultado',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'sala_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sala(): BelongsTo
    {
        return $this->belongsTo(Sala::class);
    }

    public function cuota(): HasOne
    {
        return $this->hasOne(Cuota::class);
    }

    public function PartidoEquipo()
    {
        return $this->belongsTo(PartidoHasEquipo::class, 'Partidos_has_equipos_Partidos_idPartidos', 'partidos_idPartidos');
    }

}
