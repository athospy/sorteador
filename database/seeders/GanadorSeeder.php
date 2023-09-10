<?php

namespace Database\Seeders;

use App\Models\Ganador;
use Illuminate\Database\Seeder;

class GanadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Ganador::factory(10)->create();
    }
}
