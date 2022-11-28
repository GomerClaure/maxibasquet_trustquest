<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Juez;
use App\Models\JuecesPorPartido;
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
        // JuecesPorPartido::factory(1)->cargarDatosPartido(1,'primerJuez')->create();
        date_default_timezone_set('America/La_Paz');
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => 1,
            'IdPartido'=>1,
            'TipoJuez'=>'primerJuez',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => 2,
            'IdPartido'=>1,
            'TipoJuez'=>'segundoJuez',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => 3,
            'IdPartido'=>1,
            'TipoJuez'=>'cronometrista',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => 4,
            'IdPartido'=>1,
            'TipoJuez'=>'apuntador',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

    }
}