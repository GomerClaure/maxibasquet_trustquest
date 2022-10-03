<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Persona;
use App\Models\Equipo;
use App\Models\Transaccion;
use App\Models\Preinscripcion;
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
        return view('formulario.index',$datos);
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
        $formulario = Aplicacion::findOrFail($id);
        return view('formulario.show',$formulario);
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
