<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoPartidoTable extends Migration
{
    public function up()
    {
        Schema::create('partidoEquipo', function (Blueprint $table) {
            $table->foreignId('partido_id')->constrained();
            $table->foreignId('equipo_id')->constrained();
        
        });
    }

    public function down()
    {
        Schema::dropIfExists('partidoEquipo');
    }
}
