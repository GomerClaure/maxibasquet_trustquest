<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            'NombreRol'=>'Anotador',
            'created_at'=>now()
        ]);
        DB::table("roles")->insert([
            'NombreRol'=>'Anotador asistente',
            'created_at'=>now()
        ]);
        DB::table("roles")->insert([
            'NombreRol'=>'Administrador',
            'created_at'=>now()
        ]);
        DB::table("roles")->insert([
            'NombreRol'=>'Delegado',
            'created_at'=>now()
        ]);
        DB::table("roles")->insert([
            'NombreRol'=>'Juez',
            'created_at'=>now()
        ]);
    }
}
