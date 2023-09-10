<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cedula' => $this->faker->randomNumber(7, true),
			'nombre' => $this->faker->name(),
			'ciudad' => $this->faker->word(3, true),
			'local' => $this->faker->words(3, true),
			'nro_factura' => $this->faker->randomNumber(3, true),
			'producto' => $this->faker->words(3, true),
        ];
    }
}
