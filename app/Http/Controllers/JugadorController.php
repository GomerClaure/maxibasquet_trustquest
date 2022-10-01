<?php

namespace App\Http\Controllers;

use App\Models\Jugador;

use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Persona;

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
        return view('jugador.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('jugador.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosJugador = request()->except('_token');
        //Jugador::insert($datosJugador);

        //return response()->json($datosJugador);
        $jugador = new Jugador;
        //$jugador -> IdEquipo = $request -> IdEquipo;
        //$jugador -> IdCategoria = $request -> IdCategoria;
        //$jugador -> IdPersona = $request -> IdPersona;
        //$jugador -> IdJugador = 1;
        $jugador -> IdEquipo = $request -> IdEquipo;
        $jugador -> IdCategoria = $request -> IdCategoria;
        $jugador -> IdPersona = $request -> IdPersona;
        $jugador -> PesoJugador = 120;
        $jugador -> AlturaJugador = $request -> estatura;
        $jugador -> FotosCarnet = $request -> fotoCarnet;
        $jugador -> PosicionJugador = $request -> select1;
        $jugador -> NumeroCamiseta = $request -> nCamiseta;
        $jugador -> HabilitacionJugador = true;

        $jugador -> save();
        return $this -> create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit(Jugador $jugador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugador $jugador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador)
    {
        //
    }
}
