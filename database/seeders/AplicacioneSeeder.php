<?php

namespace Database\Seeders;

use App\Models\Aplicacion;
use Illuminate\Database\Seeder;

class AplicacioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aplicacion::factory(10)->create();
        
    }
}
