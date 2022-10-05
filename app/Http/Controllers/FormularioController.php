<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Aplicacion;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['aplicaciones'] = Aplicacion::paginate(5);
        return view('formulario.index', $datos);
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
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aplicaciones = Aplicacion::select(
            'transacciones.NumeroTransaccion',
            'transacciones.NumeroCuenta',
            'transacciones.MontoTransaccion',
            'transacciones.FechaTransaccion',
            'transacciones.FotoVaucher',
            'equipos.NombreEquipo',
            'paises.NombrePais',
            'aplicaciones.Categorias',
            'personas.NombrePersona',
            'personas.ApellidoPaterno',
            'users.email',
            'delegados.NumeroDelegado'
        )
            ->join('transacciones', 'aplicaciones.IdAplicacion', '=', 'transacciones.IdAplicacion',)
            ->join('preinscripciones', 'aplicaciones.IdPreinscripcion', '=', 'preinscripciones.IdPreinscripcion')
            ->join('campeonatos', 'preinscripciones.IdCampeonato', '=', 'campeonatos.IdCampeonato')
            ->join('categorias_por_equipo', 'campeonatos.IdCampeonato', '=', 'categorias_por_equipo.IdCampeonato')
            ->join('equipos', 'categorias_por_equipo.IdEquipo', '=', 'equipos.IdEquipo')
            ->join('delegados', 'equipos.IdDelegado', '=', 'delegados.IdDelegado')
            ->join('personas', 'delegados.IdPersona', '=', 'personas.IdPersona')
            ->join('paises', 'aplicaciones.IdPais', '=', 'paises.IdPais')
            ->join('categorias', 'categorias_por_equipo.IdCategoria', '=', 'categorias.IdCategoria')
            ->join('users', 'delegados.IdUsuario', '=', 'users.id')
            ->where("aplicaciones.IdAplicacion", "=", $id)
            ->get();
        $datos = $aplicaciones[0];
        return view('formulario.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(Delegado $formulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delegado $formulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delegado $formulario)
    {
        //
    }
}
