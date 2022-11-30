<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'FechaPartido'=>date("2022-12-30"),
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
            'IdEquipo'=>2,
            'IdPartido'=>1,
            'ScoreEquipo'=>0,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table("planilla_jugadores")->insert([
            'IdPartido'=>1,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);


        DB::table("partidos")->insert([
            "IdCategoria"=>1,
            'HoraPartido'=>date("11:00"),
            'LugarPartido'=>'Chancha D UMSS',
            'FechaPartido'=>date("2022-12-22"),
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

        DB::table("planilla_jugadores")->insert([
            'IdPartido'=>2,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}
