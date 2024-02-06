<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cuota;

class CuotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cuota::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'valor' => $this->faker->numberBetween(1, 5),
        ];
    }
}
