<?php

namespace App\Http\Controllers;
use App\Models\Juez;
use App\Models\Partido;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistrarPlanillaJuegoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('registroJugadas.navegacionRegistro');
    }
    public function registro($id)
    {
        $partido = Partido::select('partidos.FechaPartido', 'partidos.HoraPartido','jueces_por_partidos.IdJuez')
                                ->join('jueces_por_partidos','jueces_por_partidos.IdPartido','=','partidos.IdPartido')
                                ->where('partidos.EstadoPartido','=','espera')
                                ->orWhere('partidos.EstadoPartido', '=', 'jugando')
                                ->get();
        // $partido = Partido::find($id);
        // $fechaPartidoActual = $partido->FechaPartido;
        // $horaPartidoActual = $partido->HoraPartido;
        $jueces = Juez::select('personas.NombrePersona','personas.ApellidoPaterno','jueces.IdJuez')
                            ->join('personas','personas.IdPersona','=','jueces.IdPersona')
                            ->get();
        // $juecesDisponibles = DB::table('jueces_por_partidos')
        // ->select('IdJuez')
        // ->where('IdEquipo',$id)
        // ->distinct()
        // ->get();

        // $jugador = Jugador::select('personas.NombrePersona','personas.ApellidoPaterno','personas.FechaNacimiento','personas.ApellidoMaterno',
        //                         'personas.CiPersona', 'personas.Edad','personas.Foto','personas.SexoPersona',
        //                         'jugadores.FotoCarnet','jugadores.PesoJugador','jugadores.EstaturaJugador',
        //                         'jugadores.PosicionJugador','jugadores.NumeroCamiseta','personas.NacionalidadPersona',
        //                         'categorias.NombreCategoria','equipos.NombreEquipo')
        //                         ->join('personas','personas.IdPersona','=','jugadores.IdPersona')
        //                         ->join('equipos','equipos.IdEquipo','=','jugadores.IdEquipo')
        //                         ->join('categorias','categorias.IdCategoria','=','jugadores.IdCategoria')
        //                         ->where('IdJugador','=',$id)
        //                         [0];
        return $partido;
        // return view('registroJugadas.registroJueces');
    }
}
