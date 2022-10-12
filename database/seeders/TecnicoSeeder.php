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
        Tecnico::factory(5)->asignarEquipoCategoria(1,1)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(1,3)->create();
        Tecnico::factory(2)->asignarEquipoCategoria(1,5)->create();
        Tecnico::factory(3)->asignarEquipoCategoria(2,1)->create();
        Tecnico::factory(4)->asignarEquipoCategoria(3,1)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(3,2)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(3,3)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(3,4)->create();
        Tecnico::factory(3)->asignarEquipoCategoria(3,5)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(3,6)->create();
        Tecnico::factory(5)->asignarEquipoCategoria(3,7)->create();
    }
}
