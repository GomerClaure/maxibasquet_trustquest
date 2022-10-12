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
        Jugador::factory(12)->asignarEquipoCategoria(1,1)->create();
        Jugador::factory(12)->asignarEquipoCategoria(1,3)->create();
        Jugador::factory(10)->asignarEquipoCategoria(2,5)->create();
        Jugador::factory(5)->asignarEquipoCategoria(2,1)->create();
        Jugador::factory(2)->asignarEquipoCategoria(3,2)->create();
        Jugador::factory(2)->asignarEquipoCategoria(3,3)->create();
        Jugador::factory(2)->asignarEquipoCategoria(3,4)->create();
        Jugador::factory(2)->asignarEquipoCategoria(3,5)->create();
        Jugador::factory(2)->asignarEquipoCategoria(3,6)->create();
        Jugador::factory(2)->asignarEquipoCategoria(3,7)->create();
        Jugador::factory(2)->asignarEquipoCategoria(3,1)->create();
    }
}
