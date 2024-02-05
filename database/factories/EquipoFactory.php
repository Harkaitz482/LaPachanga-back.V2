<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cuota;
use App\Models\Equipo;
use App\Models\Liga;

class EquipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'puesto' => $this->faker->word(),
            'manager' => $this->faker->word(),
            'liga_id' => Liga::factory(),
            'cuota_id' => Cuota::factory(),
        ];
    }
}
