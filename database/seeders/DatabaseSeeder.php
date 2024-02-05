<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Sala::factory(10)->create();
         \App\Models\User::factory(2)->create();
         \App\Models\ApuestasCombinada::factory(10)->create();
         \App\Models\Jugador::factory(10)->create();
         \App\Models\Cuota::factory(10)->create();
         \App\Models\Liga::factory(10)->create();     
         \App\Models\Partido::factory(10)->create();
         \App\Models\Apuesta::factory(10)->create();






    }
}
