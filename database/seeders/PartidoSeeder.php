<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   date_default_timezone_set('America/La_Paz');
        DB::table("partidos")->insert([
            "IdCategoria"=>1,
            'HoraPartido'=>date("09:00"),
            'LugarPartido'=>'Chancha B UMSS',
            'FechaPartido'=>date("2022-12-24"),
            'EstadoPartido'=>'espera',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table("datos_partidos")->insert([
            'IdEquipo'=>1,
            'IdPartido'=>1,
            'ScoreEquipo'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table("datos_partidos")->insert([
            'IdEquipo'=>3,
            'IdPartido'=>1,
            'ScoreEquipo'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("partidos")->insert([
            "IdCategoria"=>1,
            'HoraPartido'=>date("11:00"),
            'LugarPartido'=>'Chancha D UMSS',
            'FechaPartido'=>date("2022-12-24"),
            'EstadoPartido'=>'espera',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table("datos_partidos")->insert([
            'IdEquipo'=>1,
            'IdPartido'=>2,
            'ScoreEquipo'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table("datos_partidos")->insert([
            'IdEquipo'=>3,
            'IdPartido'=>2,
            'ScoreEquipo'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("partidos")->insert([
            "IdCategoria"=>1,
            'HoraPartido'=>date("09:00"),
            'LugarPartido'=>'Chancha E UMSS',
            'FechaPartido'=>date("2022-12-24"),
            'EstadoPartido'=>'espera',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
