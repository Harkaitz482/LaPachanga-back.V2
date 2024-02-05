<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ApuestasCombinada;
use App\Models\User;

class ApuestasCombinadaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ApuestasCombinada::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fecha/hora' => $this->faker->time(),
            'user_id' => User::factory(),
        ];
    }
}
