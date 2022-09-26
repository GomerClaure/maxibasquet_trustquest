<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table("paises")->insert([
            'NombrePais'=>'Brasil',
            'CodigoPais'=>'+55',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Chile',
            'CodigoPais'=>'+56',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Aruba',
            'CodigoPais'=>'+297',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Trinidad y Tobago',
            'CodigoPais'=>'+1',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Argentina',
            'CodigoPais'=>'+54',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Venezuela',
            'CodigoPais'=>'+58',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Uruguay',
            'CodigoPais'=>'+598',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Guyana',
            'CodigoPais'=>'+592',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Peru',
            'CodigoPais'=>'+51',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Ecuadpr',
            'CodigoPais'=>'+593',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Bolivia',
            'CodigoPais'=>'+591',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Paraguay',
            'CodigoPais'=>'+595',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Colombia',
            'CodigoPais'=>'+57',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Caribe Neerlandés Curazao',
            'CodigoPais'=>'+599',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Surinam',
            'CodigoPais'=>'+597',
            'created_at'=>now()
        ]);
        DB::table("paises")->insert([
            'NombrePais'=>'Guayana Francesa',
            'CodigoPais'=>'+594',
            'created_at'=>now()
        ]);
    }
}
