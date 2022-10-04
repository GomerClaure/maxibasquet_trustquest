<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("personas") -> insert([
            'IdPersona' =>1,
            'CiPersona' => '8001234',
            'NombrePersona'=>'superman',
            'ApellidoPaterno' => 'teran',
            'ApellidoMaterno' => 'paco',
            'FechaNacimiento' => date("2023-09-12"),
            'SexoPersona' => 'masculino',
            'Edad' =>23,
            'Foto' =>'aqui va la foto',
            'created_at'=>now(),
        ]);
    }
}
