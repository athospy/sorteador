<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GanadorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente_id' => createOrRandomFactory(\App\Models\Cliente::class),
			'fecha' => $this->faker->dateTime(),
        ];
    }
}
