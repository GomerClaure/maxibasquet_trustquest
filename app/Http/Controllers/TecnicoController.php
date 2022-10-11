<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
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
        $tecnico = Tecnico::select('personas.NombrePersona','personas.ApellidoPaterno','personas.ApellidoMaterno', 
                                    'personas.FechaNacimiento',
                                    'personas.Edad','personas.Foto','tecnicos.RolesTecnicos','personas.NacionalidadPersona',
                                    'categorias.NombreCategoria','equipos.NombreEquipo')
                                    ->join('personas','personas.IdPersona','=','tecnicos.IdPersona')
                                    ->join('equipos','equipos.IdEquipo','=','tecnicos.IdEquipo')
                                    ->join('categorias','categorias.IdCategoria','=','tecnicos.IdCategoria')
                                    ->where('IdTecnicos','=',$id)
                                    ->get();
        
        return $tecnico;

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
