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
            $table->integer('equipo_id')->constrained();
            $table->integer('equipo2_id')->constrained();
            $table->string('fecha/hora');
            $table->string('Puntuacion');
            $table->foreignId('liga_id')->constrained();
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
