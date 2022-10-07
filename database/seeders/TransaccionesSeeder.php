<?php

namespace Database\Seeders;
use App\Models\Transaccion;
use Illuminate\Database\Seeder;

class TransaccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaccion::factory(10)->create();
    }
}

