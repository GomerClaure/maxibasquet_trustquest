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
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 1,
            'IdCategoria' => 3,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 2,
            'IdCategoria' => 5,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 2,
            'IdCategoria' => 1,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 3,
            'IdCategoria' => 1,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 3,
            'IdCategoria' => 2,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 3,
            'IdCategoria' => 3,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 3,
            'IdCategoria' => 4,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 3,
            'IdCategoria' => 5,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 3,
            'IdCategoria' => 6,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 3,
            'IdCategoria' => 7,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 4,
            'IdCategoria' => 7,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 5,
            'IdCategoria' => 7,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 6,
            'IdCategoria' => 4,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 7,
            'IdCategoria' => 1,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 8,
            'IdCategoria' => 6,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 9,
            'IdCategoria' => 2,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 10,
            'IdCategoria' => 3,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 10,
            'IdCategoria' => 5,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
        DB::table('categorias_por_equipo')->insert([
            'IdEquipo' => 10,
            'IdCategoria' => 6,
            'IdCampeonato' => 1,
            'created_at'=>now()
        ]);
    }
}
