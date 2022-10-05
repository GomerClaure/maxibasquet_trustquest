<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategoriasPorEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 1,
            'IdCategoria' => 1,
            'IdCampeonato' => 1
        ]);
    }
}
