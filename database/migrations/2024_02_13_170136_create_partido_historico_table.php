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
        Schema::create('partidos_historicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partido_id');
            $table->string('mapa');
            $table->string('arbitro');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('equipo2_id');
            $table->date('fecha');
            $table->string('hora');
            $table->string('puntuacion');
            $table->unsignedBigInteger('liga_id');
            $table->string('tipo_operacion');
            $table->timestamp('fecha_operacion')->useCurrent();
    
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos_historico');
    }
};
