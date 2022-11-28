<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Equipo;
use Illuminate\Database\Seeder;

class JuecesPorPartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipo::factory(10)->create();
    }
}