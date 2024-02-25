<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_cuotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('equipo_id')->constrained();
            $table->foreignId('cuota_id')->constrained();
            $table->foreignId('partido_id')->constrained();
            $table->string('resultado');
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_cuotas');
    }
}

