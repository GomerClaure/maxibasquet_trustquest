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
            'IdDelegado'=>1,
            'IdPersona'=>1,
            'IdUsuario'=>1,
            'NombreDelegado' => '+591 4567895',
            'created_at'=>now()
        ]);
    }
}
