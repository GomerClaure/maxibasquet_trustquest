<?php

namespace Database\Seeders;

use App\Models\Aplicacion;
use Illuminate\Support\Facades\DB;
use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipo::factory(10)->create();
        $equipos = Equipo::select()->get();
        foreach ($equipos as $equipo) {
            Aplicacion::where('IdAplicacion',$equipo->IdAplicacion)
                        ->update(['NombreEquipo'=>$equipo->NombreEquipo,'EstadoAplicacion'=>'Aceptado']);
        }
    }
}
