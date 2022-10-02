<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("equipos")->insert([
            'IdAplicacion'=>1,
            'NombreEquipo'=>"Batmam",
            'LogoEquipo'=>"logo1",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>2,
            'NombreEquipo'=>"Superman",
            'LogoEquipo'=>"logo2",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>3,
            'NombreEquipo'=>"Flash",
            'LogoEquipo'=>"logo3",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>4,
            'NombreEquipo'=>"Aquaman",
            'LogoEquipo'=>"logo4",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>5,
            'NombreEquipo'=>"Hulk",
            'LogoEquipo'=>"logo5",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>6,
            'NombreEquipo'=>"Wolverin",
            'LogoEquipo'=>"logo6",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>7,
            'NombreEquipo'=>"Deathpool",
            'LogoEquipo'=>"logo7",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>8,
            'NombreEquipo'=>"AironMan",
            'LogoEquipo'=>"logo8",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>9,
            'NombreEquipo'=>"Falcon",
            'LogoEquipo'=>"logo9",
            'created_at'=>now()
        ]);
        DB::table("equipos")->insert([
            'IdAplicacion'=>10,
            'NombreEquipo'=>"Thor",
            'LogoEquipo'=>"logo10",
            'created_at'=>now()
        ]);
    }
}
