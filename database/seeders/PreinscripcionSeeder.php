<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PreinscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("preinscripciones")->insert([
            'IdCampeonato'=>1,
            'FechaIncioPreinscripcion'=>date("2022-01-01"),
            'FechaFinPreinscripcion'=>date("2022-10-01"),
            'Monto'=>250,
            'created_at'=>now()
        ]);
        DB::table("preinscripciones")->insert([
            'IdCampeonato'=>1,
            'FechaIncioPreinscripcion'=>date("2022-10-01"),
            'FechaFinPreinscripcion'=>date("2023-01-01"),
            'Monto'=>350,
            'created_at'=>now()
        ]);
    }
}
