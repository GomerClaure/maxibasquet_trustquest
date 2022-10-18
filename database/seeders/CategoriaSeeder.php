<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categorias")->insert([
            'NombreCategoria'=>'+30',
            'EdadMinima'=>30,
            'EdadMaxima'=>35,
            'created_at'=>now()
        ]);
        DB::table("categorias")->insert([
            'NombreCategoria'=>'+35',
            'EdadMinima'=>36,
            'EdadMaxima'=>40,
            'created_at'=>now()
        ]);
        DB::table("categorias")->insert([
            'NombreCategoria'=>'+40',
            'EdadMinima'=>41,
            'EdadMaxima'=>45,
            'created_at'=>now()
        ]);
        DB::table("categorias")->insert([
            'NombreCategoria'=>'+45',
            'EdadMinima'=>46,
            'EdadMaxima'=>50,
            'created_at'=>now()
        ]);
        DB::table("categorias")->insert([
            'NombreCategoria'=>'+50',
            'EdadMinima'=>51,
            'EdadMaxima'=>55,
            'created_at'=>now()
        ]);
        DB::table("categorias")->insert([
            'NombreCategoria'=>'+55',
            'EdadMinima'=>56,
            'EdadMaxima'=>60,
            'created_at'=>now()
        ]);
        DB::table("categorias")->insert([
            'NombreCategoria'=>'+60',
            'EdadMinima'=>61,
            'EdadMaxima'=>75,
            'created_at'=>now()
        ]);
    }
}
