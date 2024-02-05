<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mapa',
        'arbitro',
        'equipo_id',
        'equipo2_id',
        'fecha/hora',
        'Puntuacion',
        'liga_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'liga_id' => 'integer',
    ];

    public function liga(): BelongsTo
    {
        return $this->belongsTo(Liga::class);
    }

    public function apuestasCombinadas(): BelongsToMany
    {
        return $this->belongsToMany(ApuestasCombinada::class);
    }

    public function equipos(): BelongsToMany
    {
        return $this->belongsToMany(Equipo::class);
    }
}
