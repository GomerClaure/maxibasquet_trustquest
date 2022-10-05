<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Persona;
use App\Models\Tecnicos;
use App\Models\Aplicaciones;
use App\Models\Categoria;
use App\Models\Paises;
use App\Models\categoria_por_equipo;

class EquipoController extends Controller
{
    public function index()
    {   
        $c=Equipo::select('paises.NombrePais','equipos.NombreEquipo')
                  ->join('aplicaciones','equipos.IdAplicacion','=','aplicaciones.IdAplicacion')
                  ->join('paises','aplicaciones.IdPais','=','paises.IdPais')
                  ->where('IdEquipo','=',1)
                  ->get();
        //Sobre la Categoria de un equipo
        $categoria=Categoria::select('categorias.NombreCategoria')->distinct()
                  ->join('jugadores','categorias.IdCategoria','=','jugadores.IdCategoria')
                  ->get();

        //Sobre la Categoria de un equipo
        $categoria=Categoria::select('categorias.NombreCategoria')->distinct()
        ->join('jugadores','categorias.IdCategoria','=','jugadores.IdCategoria')
        ->get();
        //informacion de una persona que es un tecnico 
        $informaciontecnicos=Persona::select('personas.NombrePersona','personas.ApellidoPaterno','personas.ApellidoMaterno','personas.Foto')
        ->join('tecnicos','personas.IdPersona','=','tecnicos.IdPersona')
        ->get();
       //Informacion de una persona que es un jugador
        $informacion=Persona::select('jugadores.IdJugador','personas.NombrePersona','personas.ApellidoPaterno','personas.ApellidoMaterno','personas.Foto')
             ->join('jugadores','personas.IdPersona','=','jugadores.IdPersona')
             ->get();
             
             return view('equipo.Equipos',compact('informaciontecnicos','informacion','categoria','c'));
             
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
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
