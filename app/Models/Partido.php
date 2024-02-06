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
        'fecha',
        'hora',
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

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function equipo2()
    {
        return $this->belongsTo(Equipo::class, 'equipo2_id');
    }

    public function cuotas()
    {
        // Assuming there is a 'cuotas' method on the Equipo model that returns the Cuota relationship
        return $this->hasManyThrough(Cuota::class, Equipo::class, 'id', 'id', 'equipo_id', 'cuota_id');
    }

}
