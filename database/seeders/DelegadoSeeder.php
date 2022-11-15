<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Delegado;
class DelegadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delegado::factory(10)->create();
    }
}
