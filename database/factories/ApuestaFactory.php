<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Apuesta;
use App\Models\Equipo;
use App\Models\Partido;
use App\Models\Sala;
use App\Models\User;

class ApuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apuesta::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'gasto' => $this->faker->word(),
            'ganancias' => $this->faker->word(),
            'fecha/hora' => $this->faker->time(),
            'user_id' => User::factory(),
            'sala_id' => Sala::factory(),
            'equipo_id' => Equipo::factory(),
            'partido_id' => Partido::factory(),

        ];
    }
}
