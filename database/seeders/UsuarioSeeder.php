<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Equipo;
use App\Models\Delegado;
use App\Models\Aplicacion;
use Illuminate\Support\Str;
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
        User::factory(1)->asignarRol(1)->asignarNombre('Juez')->create();
        User::factory(1)->asignarRol(2)->asignarNombre('JuezAsistente')->create();
        User::factory(1)->asignarRol(3)->asignarNombre('Administrador')->create();
        $idUsrDelegado = new User;
        $idUsrDelegado -> name = 'Delegado';
        $idUsrDelegado -> IdRol = 4;
        $idUsrDelegado -> email = 'delegado@gmail.com';
        $idUsrDelegado -> email_verified_at = now();
        $idUsrDelegado -> password = '$2y$10$9Rs9YLHXnxXQCY0NQnqbjOZhUAK7BFOO.2ml6ytO1kij2PTA8O6ua';
        $idUsrDelegado -> save();
        $delegado = new Delegado;
        $delegado->IdUsuario =$idUsrDelegado->id;
        $delegado->FechaRegistroDelegado=now();
        $delegado->TelefonoDelegado = '756167559';
        $delegado->created_at = now();
        $delegado->updated_at = now();
        $delegado->save();
        Aplicacion::factory()->create();
        $aplicaciones = Aplicacion::select()->get();
        Aplicacion::where('IdAplicacion',$aplicaciones[0]->IdAplicacion)
                    ->update(['EstadoAplicacion'=>'Aceptado']);
        $equipo = new Equipo;
        $equipo -> IdDelegado = $delegado->IdDelegado;
        $equipo -> IdAplicacion = 61;
        $equipo -> NombreEquipo = 'Los caballos';
        $equipo -> LogoEquipo = 'uploads\logo.jpg';
        $equipo -> created_at = now();
        $equipo -> updated_at = now();
        $equipo->save();
    }
}
