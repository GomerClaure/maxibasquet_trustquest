<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DelegadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("delegados")->insert([
            'NombreCampeonato'=>'MAXI BASQUET',
            'FechaInicio'=>date("2023-01-05"),
            'FechaFin'=>date("2023-01-08"),
            'created_at'=>now()
        ]);
    }
}
