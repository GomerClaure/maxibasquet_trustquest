<?php

namespace Database\Seeders;

use App\Models\Juez;
use Illuminate\Database\Seeder;

class JuezSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Juez::factory(5)->create();
    }
}
