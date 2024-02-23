<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperCuota extends Model
{
    use HasFactory;

    protected $table = 'super_cuotas';

    protected $fillable = [
        'nombre',
        'equipo_id',
        'cuota_id',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function cuota()
    {
        return $this->belongsTo(Cuota::class);
    }
}
