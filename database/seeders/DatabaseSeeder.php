<?php

namespace Database\Seeders;

use App\Models\Aplicacione;
use App\Models\Delegado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /* PaisSeeder::class,
         TorneoSeeder::class,
         PreinscripcionSeeder::class,
         CategoriaSeeder::class,
         AplicacioneSeeder::class,*/ 
        $this->call([
           // PersonaSeeder::class,
           UsuarioSeeder::class,
           DelegadoSeeder::class,
           EquipoSeeder::class,
        ]);
    }
}
