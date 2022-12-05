<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Credencial;
use App\Models\Datos_partidos;
use App\Models\Equipo;
use App\Models\Tecnico;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
                    'personas.ApellidoMaterno','tecnicos.RolesTecnicos','tecnicos.IdTecnicos','personas.Foto')
                    ->join('personas','tecnicos.IdPersona','=','personas.IdPersona')
                    ->join('equipos','tecnicos.IdEquipo','=','equipos.IdEquipo')
                    ->join('categorias','tecnicos.IdCategoria','categorias.IdCategoria')
                    ->where('equipos.NombreEquipo','=',$equipo)
                    ->where('categorias.NombreCategoria','=',$categoria)
                    ->orderBy('personas.NombrePersona')
                    ->get();
        
        $equipos = Equipo::select('NombreEquipo','NombreCategoria')
                            ->join('categorias_por_equipo','categorias_por_equipo.IdEquipo','equipos.IdEquipo')
                            ->join('categorias','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
                            ->where('equipos.NombreEquipo','=',$equipo)
                            ->where('categorias.NombreCategoria','=',$categoria)
                            ->get();
        if(! $equipos->isEmpty()){
            $equipo = $equipos[0]->NombreEquipo;
            $categoria = $equipos[0]->NombreCategoria;
        }else{ 
            $equipo = null;
            $categoria = null;
        }
        return view('tecnico.lista',compact('tecnicos','equipo','categoria'));
    }

    /** Lista de tecnicos para eliminar */
    public function listaEliminar($equipo,$categoria)
    {
        $tecnicos = Tecnico::select('personas.NombrePersona','personas.ApellidoPaterno',
                    'personas.ApellidoMaterno','personas.CiPersona','tecnicos.RolesTecnicos','tecnicos.IdTecnicos','personas.Foto')
                    ->join('personas','tecnicos.IdPersona','=','personas.IdPersona')
                    ->join('equipos','tecnicos.IdEquipo','=','equipos.IdEquipo')
                    ->join('categorias','tecnicos.IdCategoria','categorias.IdCategoria')
                    ->where('equipos.NombreEquipo','=',$equipo)
                    ->where('categorias.NombreCategoria','=',$categoria)
                    ->orderBy('personas.NombrePersona')
                    ->get();
        
        $equipos = Equipo::select('NombreEquipo','NombreCategoria')
                            ->join('categorias_por_equipo','categorias_por_equipo.IdEquipo','equipos.IdEquipo')
                            ->join('categorias','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
                            ->where('equipos.NombreEquipo','=',$equipo)
                            ->where('categorias.NombreCategoria','=',$categoria)
                            ->get();
        if(! $equipos->isEmpty()){
            $equipo = $equipos[0]->NombreEquipo;
            $categoria = $equipos[0]->NombreCategoria;
        }else{
            $equipo = null;
            $categoria = null;
        }
        return view('tecnico.eliminar',compact('tecnicos','equipo','categoria'));
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
        $tecnico =$this->formatoFecha($tecnico);
        if ($id <= 0 || $id >= 9000000000000000000 || $tecnico->isEmpty()) {
            $mensaje ="No encontrado";
            return $mensaje;
                          }
        $tecnico = $tecnico[0];
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
    {  date_default_timezone_set('America/La_Paz');
        
        $tecnico = Tecnico::select()
                            ->join('personas','personas.IdPersona','tecnicos.IdPersona')
                            ->where('IdTecnicos',$id)
                            ->get();
        $datosTecnico = $tecnico[0];
        $equipo = Equipo::find($datosTecnico -> IdEquipo);
        $categoria = Categoria::find($datosTecnico -> IdCategoria);
        $partido = $this->comprobarPartido($equipo -> IdEquipo,$datosTecnico->IdCategoria);
        if ($partido) {
            return redirect('eliminar/tecnico/'.$equipo->NombreEquipo.'/'.$categoria->NombreCategoria)->with('PartidoRegistrado','No se puede eliminar los datos del tecnico existe un partido en curso o en espera'); 
        }
        Tecnico::where('IdTecnicos',$id)->delete();
        Credencial::where('IdPersona',$datosTecnico->IdPersona)->delete();
        Persona::where('IdPersona',$datosTecnico->IdPersona)->delete();
       
        return redirect('eliminar/tecnico/'.$equipo->NombreEquipo.'/'.$categoria->NombreCategoria)->with('mensaje','Datos del técnico eliminados correctamente'); 
    }

    /**Verificar si existe un partido progamado para un equipo */
    public function comprobarPartido($idEquipo, $categoria ){
        date_default_timezone_set('America/La_Paz');
        $fechaActual = date('Y-m-d');
        $horaActual = date('G:i:s');
        $partido = Datos_partidos::select()
                    ->join("partidos","partidos.IdPartido","=","datos_partidos.IdPartido")
                    ->where("IdEquipo",$idEquipo)
                    ->where("partidos.IdCategoria",$categoria)
                    ->where("FechaPartido",">=",$fechaActual)
                    ->where("EstadoPartido","=","espera")
                    ->orwhere("EstadoPartido","=","curso")
                    ->get();
        if (!$partido->isEmpty()) {
            return true;
        }
        else{
            return false;
        }
    }
    public function lista(){
        $tecnicos = Tecnico::select()
                    ->join('personas','personas.IdPersona','tecnicos.IdPersona')
                    ->orderby('personas.NombrePersona')
                    ->orderby('personas.ApellidoPaterno')
                    ->get();
        return view('tecnico.tecnicos',compact('tecnicos'));
    }

}
