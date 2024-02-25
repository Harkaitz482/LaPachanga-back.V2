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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->string('mapa');
            $table->string('arbitro');
            $table->foreignId('equipo_id')->constrained('equipos');
            $table->foreignId('equipo2_id')->constrained('equipos');
            $table->date('fecha');
            $table->string('hora');
            $table->integer('Puntuacion');
            $table->string('ganador')->nullable();
            $table->enum('estado',['pendiente','Finalizado','suspendido'])->default('pendiente');
            $table->foreignId('liga_id')->constrained('ligas');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
