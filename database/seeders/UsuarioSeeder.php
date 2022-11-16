<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->asignarRol(1)->create();
        User::factory(20)->asignarRol(2)->create();
        User::factory(2)->asignarRol(3)->create();
        User::factory(1)->asignarRol(1)->asignarNombre('Juez')->create();
        User::factory(1)->asignarRol(2)->asignarNombre('JuezAsistente')->create();
        User::factory(1)->asignarRol(3)->asignarNombre('Administrador')->create();
        User::factory(1)->asignarRol(4)->asignarNombre('Delegado')->create();
    }
}
