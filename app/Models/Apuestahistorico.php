<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApuestasHistorico extends Model
{
    protected $table = 'apuestas_historico'; // Asegúrate de que el nombre de la tabla sea correcto.

    // Indica que el modelo no debe preocuparse por las columnas 'created_at' y 'updated_at'
    public $timestamps = false;

    protected $fillable = [
        'apuesta_id', // Asume que guardas el ID de la apuesta original para referencia.
        'gasto',
        'ganancias',
        'fecha',
        'user_id',
        'sala_id',
        'equipo_id',
        'partido_id',
        'tipo_operacion', // INSERT, UPDATE, DELETE
        'fecha_operacion'
    ];

    // Aquí puedes definir relaciones con otros modelos si es necesario, por ejemplo, con el usuario o la apuesta original.
}
