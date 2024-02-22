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
        Schema::create('apuestas', function (Blueprint $table) {
            $table->id();
            $table->string('gasto');
            $table->string('ganancias');
            $table->date('fecha');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('sala_id')->constrained();
            $table->foreignId('equipo_id')->constrained();
            $table->foreignId('partido_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apuestas');
    }
};
