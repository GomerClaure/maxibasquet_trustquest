<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') ->insert([
            'id'=>1,
            'name'=>'ronald',
            'email'=>'ejemplo@hotmial.com',
            'created_at'=>now(),
            'password'=>'1234',
            'remember_token'=>'4d45s6d432ds',
            'created_at'=>now(),
        ]);
    }
}
