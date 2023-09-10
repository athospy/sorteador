<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipanteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cedula' => $this->faker->firstName(),
			'nombre' => $this->faker->firstName(),
			'ciudad' => $this->faker->firstName(),
			'cupones' => $this->faker->randomNumber(),
        ];
    }
}
