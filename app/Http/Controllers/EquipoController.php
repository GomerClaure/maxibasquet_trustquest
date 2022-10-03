<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Jugadores;
use App\Models\Personas;
use App\Models\Tecnicos;

class EquipoController extends Controller
{
    public function index()
    {
        $datos=Equipo::get();

        $informaciontecnicos=Personas::select('personas.NombrePersona','personas.ApellidoPaterno','personas.ApellidoMaterno')
        ->join('tecnicos','personas.IdPersona','=','tecnicos.IdPersona')
        ->get();
       
        $informacion=Personas::select('personas.NombrePersona','personas.ApellidoPaterno','personas.ApellidoMaterno')
             ->join('jugadores','personas.IdPersona','=','jugadores.IdPersona')
             ->get();

             return view('equipo.Equipos',compact('informaciontecnicos','informacion','datos'));
        
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
