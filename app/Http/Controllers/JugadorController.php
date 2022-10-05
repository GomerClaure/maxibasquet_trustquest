<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $jugador = Jugador::select('personas.NombrePersona','personas.ApellidoPaterno','personas.FechaNacimiento',
                                'personas.Edad','personas.Foto','jugadores.PesoJugador','jugadores.AlturaJugador',
                                'jugadores.PosicionJugador','jugadores.NumeroCamiseta','personas.Nacionalidad',
                                'categorias.NombreCategoria','equipos.NombreEquipo')
                                ->join('personas','personas.IdPersona','=','jugadores.IdPersona')
                                ->join('equipos','equipos.IdEquipo','=','jugadores.IdEquipo')
                                ->join('categorias','categorias.IdCategoria','=','jugadores.IdCategoria')
                                ->where('IdJugador','=',$id) 
                                ->get();

        $jugador = $this->formatoFecha($jugador);
        if ($id <= 0 || $id >= 9000000000000000000 || $jugador->isEmpty()) {
                $mensaje ="No encontrado";
                return $mensaje;
                                }                        
        return view('datosJugador',compact('jugador'));
    }
    /**
     * Cambia el formato de la fecha de A-M-D a D/M/A
     */
    public function formatoFecha($jugador){
        if (!$jugador->isEmpty()) {
            foreach($jugador as $jug){
                $fechas=explode( "-",$jug->FechaNacimiento);
                $formato=$fechas[2]."/".$fechas[1]."/".$fechas[0];
                $jug->FechaNacimiento=$formato;
            }
        }
 
        return $jugador; 
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
