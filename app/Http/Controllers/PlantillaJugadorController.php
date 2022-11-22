<?php

namespace App\Http\Controllers;

use App\Models\PlantillaJugador;
use App\Models\Persona;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlantillaJugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arregloEquipoA = DB::table('jugadores')
                            ->select('*')
                            ->where('IdEquipo',1)
                            ->get();

        $personasA = array();
        $contador = 0;
        foreach ($arregloEquipoA as $jugador){
            $personasA[$contador] = Persona::find($jugador->IdPersona);
            $contador++;
        }

        $arregloEquipoB = DB::table('jugadores')
                            ->select('*')
                            ->where('IdEquipo',2)
                            ->get();

        $personasB = array();
        $contador = 0;
        foreach ($arregloEquipoB as $jugador){
            $personasB[$contador] = Persona::find($jugador->IdPersona);
            $contador++;
        }
        
        return view("plantillaJugador.index",compact('arregloEquipoA','personasA','arregloEquipoB','personasB'));
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
     * @param  \App\Models\PlantillaJugador  $plantillaJugador
     * @return \Illuminate\Http\Response
     */
    public function show(PlantillaJugador $plantillaJugador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantillaJugador  $plantillaJugador
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantillaJugador $plantillaJugador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlantillaJugador  $plantillaJugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlantillaJugador $plantillaJugador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantillaJugador  $plantillaJugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantillaJugador $plantillaJugador)
    {
        //
    }
}
