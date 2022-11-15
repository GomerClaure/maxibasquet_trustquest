<?php

namespace Database\Seeders;

use App\Models\Tecnico;
use Illuminate\Database\Seeder;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tecnico::factory(5)->asignarEquipoCategoria(1,3)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(2,3)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(3,3)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(4,3)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(5,3)->create();
    }
}
