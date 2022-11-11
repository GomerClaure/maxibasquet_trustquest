<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
        // DB::table('users') ->insert([
        //     'id'=>1,
        //     'name'=>'ronald',
        //     'IdRol'=>1,
        //     'email'=>'ronaldt@hotmial.com',
        //     'created_at'=>now(),
        //     'password'=>'12345678',
        //     'remember_token'=>'4d45s6d432ds',
        //     'created_at'=>now(),
        // ]);
    }
}
