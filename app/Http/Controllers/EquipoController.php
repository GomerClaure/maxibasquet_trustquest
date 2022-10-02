<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Jugadores;

class EquipoController extends Controller
{
    public function index()
    {
        //Consultar informacion
        //$datos= Equipo::select('jugadores.IdJugador','jugadores.PesoJugador');
        //$datos['jugadores']=Equipo::paginate(5);
        /*
        $datos=Equipo::get();
        return view('equipo.Equipos',compact('datos'));
        */
        $datos=Equipo::get();
        $datosjugador=Jugadores::get();
        return view('equipo.Equipos',compact('datos'),compact('datosjugador'));
        
    }
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
        //
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
