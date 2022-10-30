<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Persona;
use App\Models\Aplicacion;
use App\Models\CuerpoTecnico;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CuerpoTecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($equipo,$categoria)
    {
        $tecnicos = CuerpoTecnico::select('personas.NombrePersona','personas.ApellidoPaterno',
                    'personas.ApellidoMaterno','tecnicos.RolesTecnicos','tecnicos.IdTecnicos','personas.Foto')
                    ->join('personas','tecnicos.IdPersona','=','personas.IdPersona')
                    ->join('equipos','tecnicos.IdEquipo','=','equipos.IdEquipo')
                    ->join('categorias','tecnicos.IdCategoria','categorias.IdCategoria')
                    ->where('equipos.NombreEquipo','=',$equipo)
                    ->where('categorias.NombreCategoria','=',$categoria)
                    ->orderBy('IdTecnicos', 'asc')
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
        return view('tecnico.listaTecnicos',compact('tecnicos','equipo','categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cuerpoTecnico = DB::table('tecnicos')
                            ->select('IdCategoria')
                            ->where('IdEquipo',$id)
                            ->distinct()
                            ->get();

        $arreglo = array();
        $contador = 0;
        foreach ($cuerpoTecnico as $categoria) {
            $arreglo[$contador] = $categoria->IdCategoria;
            $contador++;
        }

        $categorias = DB::table('categorias')
                        ->select('*')
                        ->whereIn('IdCategoria',$arreglo)
                        ->get();

        $paises = DB::table('paises')
                ->orderBy('Nacionalidad', 'asc')
                ->get();

        return view('tecnico.create',compact('categorias','id','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        date_default_timezone_set('America/La_Paz');
        $fechaActual = date('Y-m-d');
        $anio = date('Y')-100;
        $fecha = $anio."-01-01";

        $request -> validate([
            'ci'=>'required|numeric|digits_between:6,9',
            'nombre'=>'required|min:3|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoPaterno'=>'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoMaterno'=>'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'fechaNacimiento'=>'required|date|before:'.$fechaActual.'|after:'.$fecha.'|regex:/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/',
            'selectNacionalidad'=>'required',
            'selectSexo'=>'required',
            'edad'=>'required|numeric|min:1|max:100',
            'fotoTecnico'=>'required|image|dimensions:width=472, height=472',
            'selectCategoria'=>'required',
            'fotoCarnet'=>'required|image',
            'selectRol'=>'required'
        ]);

        $imagenTecnico = $request->file('fotoTecnico')->store('uploads','public');
        $imagenCarnet = $request->file('fotoCarnet')->store('uploads','public');

        $carnetId = $request -> ci;
        $consulta2 = DB::table('personas')
                        ->select('CiPersona')
                        ->where('CiPersona', $carnetId, 1)
                        ->get();
        //return $consulta2;
        if(!$consulta2 ->isEmpty()){
            return back()->withInput()->with('mensajeErrorExiste','El Ci esta registrado');
        }

        $fecha = $request -> fechaNacimiento;
        $anio = substr($fecha, 0, 4);
        $edadReal = date('Y')-$anio;
        $edadActual = $request -> edad;
        if($edadReal != $edadActual){
            return back()->withInput()->with('mensajeErrorEdad','La edad no coincide con la fecha de nacimiento');
        }

        $rol = 'Entrenador principal';
        if($rol == $request->selectRol){
            $consultaEntrenador = DB::table('tecnicos')
                                ->select('*')
                                ->where([['RolesTecnicos', $rol],['IdEquipo',$id],['IdCategoria',$request -> selectCategoria]])
                                ->get();

            if(!$consultaEntrenador ->isEmpty()){
                return back()->withInput()->with('mensajeErrorExiste','El entrenador principal ya esta registrado en la categoria');
            }
        }

        $persona = new Persona;
        $persona -> CiPersona = $request -> ci;
        $persona -> NombrePersona = $request -> nombre;
        $persona -> ApellidoPaterno = $request -> apellidoPaterno;
        $persona -> ApellidoMaterno = $request -> apellidoMaterno;
        $persona -> FechaNacimiento = $request -> fechaNacimiento;
        $persona -> NacionalidadPersona = $request -> selectNacionalidad;
        $persona -> SexoPersona = $request -> selectSexo;
        $persona -> Edad = $request -> edad;
        $persona -> Foto = $imagenTecnico;
        $persona -> save();

        $tenico = new CuerpoTecnico;
        $tenico -> IdEquipo = $id;
        $tenico -> IdCategoria = $request -> selectCategoria;
        $tenico -> IdPersona = $persona -> IdPersona;
        $tenico -> RolesTecnicos = $request -> selectRol;
        $tenico -> FotoCarnet = $imagenCarnet;

        $tenico -> save();
        return redirect('tecnico/create/'.$id)->with('mensaje','Se inscribio al tecnico correctamente');
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
        $tecnicos = DB::table('tecnicos')
                    ->select('*')
                    ->join('personas','tecnicos.IdPersona','=','personas.IdPersona')
                    ->where('IdTecnicos',$id)
                    ->get();

        $tecnico = $tecnicos[0];
        $cuerpoTecnico = DB::table('tecnicos')
                            ->select('IdCategoria')
                            ->where('IdEquipo',$tecnico->IdEquipo)
                            ->distinct()
                            ->get();

        $arreglo = array();
        $contador = 0;
        foreach ($cuerpoTecnico as $categoria) {
            $arreglo[$contador] = $categoria->IdCategoria;
            $contador++;
        }

        $categorias = DB::table('categorias')
                        ->select('*')
                        ->whereIn('IdCategoria',$arreglo)
                        ->get();

        $equipo = Equipo::find($tecnico->IdEquipo);

        $paises = DB::table('paises')
                ->orderBy('Nacionalidad', 'asc')
                ->get();

        return view('tecnico.edit',compact('categorias','tecnico','equipo','paises'));
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
        date_default_timezone_set('America/La_Paz');
        $fechaActual = date('Y-m-d');
        $anio = date('Y')-100;
        $fecha = $anio."-01-01";

        $request -> validate([
            'ci'=>'required|numeric|digits_between:6,9',
            'nombre'=>'required|min:3|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoPaterno'=>'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoMaterno'=>'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'fechaNacimiento'=>'required|date|before:'.$fechaActual.'|after:'.$fecha.'|regex:/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/',
            'selectNacionalidad'=>'required',
            'selectSexo'=>'required',
            'edad'=>'required|numeric|min:1|max:100',
            'fotoTecnico'=>'image|dimensions:width=472, height=472',
            'selectCategoria'=>'required',
            'fotoCarnet'=>'image',
            'selectRol'=>'required'
        ]);


        //$datosTecnico = $request->except(['_token','_method']);

        $carnetId = $request -> ci;
        $consulta2 = DB::table('personas')
                        ->select('CiPersona')
                        ->where('CiPersona', $carnetId, 1)
                        ->get();

        $tecnicos = DB::table('tecnicos')
                    ->select('*')
                    ->join('personas','tecnicos.IdPersona','=','personas.IdPersona')
                    ->where('IdTecnicos',$id)
                    ->get();
        $tecnico = $tecnicos[0];

        if(!$consulta2 ->isEmpty() && $request->ci != $tecnico->CiPersona){
            return back()->withInput()->with('mensajeErrorExiste','El Ci esta registrado');
        }

        $fecha = $request -> fechaNacimiento;
        $anio = substr($fecha, 0, 4);
        $edadReal = date('Y')-$anio;
        $edadActual = $request -> edad;
        if($edadReal != $edadActual){
            return back()->withInput()->with('mensajeErrorEdad','La edad no coincide con la fecha de nacimiento');
        }

        $rol = 'Entrenador principal';

        if($rol == $request->selectRol){
            $consultaEntrenador = DB::table('tecnicos')
                                ->select('*')
                                ->where([['RolesTecnicos', $rol],['IdEquipo',$tecnico -> IdEquipo],['IdCategoria',$request -> selectCategoria]])
                                ->get();

            if(!$consultaEntrenador ->isEmpty()){
                return back()->withInput()->with('mensajeErrorExiste','El entrenador principal ya esta registrado en la categoria');
            }
        }

        $persona = Persona::find($tecnico->IdPersona);
        $persona -> CiPersona = $request -> ci;
        $persona -> NombrePersona = $request -> nombre;
        $persona -> ApellidoPaterno = $request -> apellidoPaterno;
        $persona -> ApellidoMaterno = $request -> apellidoMaterno;
        $persona -> FechaNacimiento = $request -> fechaNacimiento;
        $persona -> NacionalidadPersona = $request -> selectNacionalidad;
        $persona -> SexoPersona = $request -> selectSexo;
        $persona -> Edad = $request -> edad;
        if($request->hasFile('fotoTecnico')){
            $persona -> Foto = $request->file('fotoTecnico')->store('uploads','public');
        }
        $persona -> save();

        $cuerpoTecnico = CuerpoTecnico::find($id);
        $cuerpoTecnico -> IdCategoria = $request -> selectCategoria;
        $cuerpoTecnico -> RolesTecnicos = $request -> selectRol;
        if($request->hasFile('fotoCarnet')){
            $cuerpoTecnico -> FotoCarnet = $request->file('fotoCarnet')->store('uploads','public');
        }
        $cuerpoTecnico -> save();

        $equipo = Equipo::find($cuerpoTecnico -> IdEquipo);
        $categoria = Categoria::find($request -> selectCategoria);
        return redirect('tecnico/'.$equipo->NombreEquipo.'/'.$categoria->NombreCategoria)->with('mensaje','Se inscribio al tecnico correctamente');
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
