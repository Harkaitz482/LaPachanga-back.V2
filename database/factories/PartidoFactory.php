<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Liga;
use App\Models\Partido;

class PartidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partido::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'mapa' => $this->faker->word(),
            'arbitro' => $this->faker->word(),
            'equipo_id' => Equipo::factory(),
            'equipo2_id' => Equipo::factory(),
            'fecha' => $this->faker->date(),
            'hora' => $this->faker->time(),
            'Puntuacion' => $this->faker->numberBetween(1, 2),
            'ganador'=> $this->faker->word(),
            'liga_id' => Liga::factory(),
        ];
    }
}
