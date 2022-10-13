<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Equipo;
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
     * Obtine la lista de tecnicos correspondientes a un equipo y categoria
     */
    public function listaTecnicos($equipo,$categoria){
        $tecnicos = Tecnico::select('personas.NombrePersona','personas.ApellidoPaterno',
                    'tecnicos.RolesTecnicos','tecnicos.IdTecnicos')
                    ->join('personas','tecnicos.IdPersona','=','personas.IdPersona')
                    ->join('equipos','tecnicos.IdEquipo','=','equipos.IdEquipo')
                    ->join('categorias','tecnicos.IdCategoria','categorias.IdCategoria')
                    ->where('equipos.IdEquipo','=',$equipo)
                    ->where('categorias.IdCategoria','=',$categoria)
                    ->get();
        $nombreEquipo = Equipo::select('NombreEquipo')
                        ->where('IdEquipo','=',$equipo)->get();
        $nombreCategoria = Categoria::select("NombreCategoria") 
                        ->where('IdCategoria','=',$categoria)->get();
        
        return view('tecnico.lista',compact('tecnicos','nombreEquipo','nombreCategoria'));
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
        $tecnico =( $this->formatoFecha($tecnico))[0];
        
        return view('tecnico.datosTecnico',compact('tecnico'));

    }
     /**
     * Cambia el formato de la fecha de A-M-D a D/M/A
     */
    public function formatoFecha($persona){
        if (!$persona->isEmpty()) {
            foreach($persona as $jug){
                $fechas=explode( "-",$jug->FechaNacimiento);
                $formato=$fechas[2]."/".$fechas[1]."/".$fechas[0];
                $jug->FechaNacimiento=$formato;
            }
        }

        return $persona;
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
