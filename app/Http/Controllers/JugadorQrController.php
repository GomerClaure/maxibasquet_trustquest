<?php

namespace App\Http\Controllers;
use App\Models\Jugador;

class JugadorQrController extends Controller
{
    public function index ($id)
    {
        echo $id;
        $jugador = Jugador::select('personas.NombrePersona','personas.ApellidoPaterno','personas.FechaNacimiento','personas.ApellidoMaterno',
                                'personas.CiPersona', 'personas.Edad','personas.Foto','personas.SexoPersona',
                                'jugadores.FotoCarnet','jugadores.PesoJugador','jugadores.EstaturaJugador',
                                'jugadores.PosicionJugador','jugadores.NumeroCamiseta','personas.NacionalidadPersona',
                                'categorias.NombreCategoria','equipos.NombreEquipo')
                                ->join('personas','personas.IdPersona','=','jugadores.IdPersona')
                                ->join('equipos','equipos.IdEquipo','=','jugadores.IdEquipo')
                                ->join('categorias','categorias.IdCategoria','=','jugadores.IdCategoria')
                                ->where('IdJugador','=',$id)
                                ->get()[0];
        // return $jugador;
        return view("jugador.datosJugadorQr", compact('jugador'));
    }
}