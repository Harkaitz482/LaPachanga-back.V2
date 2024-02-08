<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apuestas_historico', function (Blueprint $table) {
            $table->id('id_historico');
            $table->integer('apuesta_id');
            $table->decimal('gasto');
            $table->decimal('ganancias');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('partido_id');
            $table->string('tipo_operacion');
            $table->timestamp('fecha_operacion')->useCurrent();
            
            // Otras definiciones de clave foránea, si es necesario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apuestas_historico');
    }
};
