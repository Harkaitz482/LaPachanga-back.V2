<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Sala;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'saldo' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->word(),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'telefono' => $this->faker->word(),
            'historial' => $this->faker->word(),
            'rol' => $this->faker->randomElement(['usuario', 'admin']),
            // 'fechanacimiento' =>$this->faker->date(),
            'sala_id' => Sala::factory(),
        ];
    }
}
