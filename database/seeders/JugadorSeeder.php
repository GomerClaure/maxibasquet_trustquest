<?php

namespace Database\Seeders;

use App\Models\Jugador;
use Illuminate\Database\Seeder;

class JugadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jugador::factory(12)->asignarEquipo(1)->create();
        Jugador::factory(10)->asignarEquipo(2)->create();
        Jugador::factory(2)->asignarEquipo(3)->create();
    }
}
