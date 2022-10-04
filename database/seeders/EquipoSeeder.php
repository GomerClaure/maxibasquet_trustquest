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
        DB::table('equipos')->insert([
            'IdEquipo' => 1,
            'IdDelegado' => 1,
            'IdAplicacion' =>1,
            'NombreEquipo' => 'batman',
            'LogoEquipo' =>'batman',
            'created_at'=>now()
        ]);
    }
}
