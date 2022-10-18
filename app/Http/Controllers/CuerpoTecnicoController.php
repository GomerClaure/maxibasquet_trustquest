<?php

namespace App\Http\Controllers;

use App\Models\CuerpoTecnico;

use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CuerpoTecnicoController extends Controller
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
    public function create($id)
    {
        $idTecnico = $id;
        $categorias = Categoria::all();
        return view('tecnico.create',compact('categorias','idTecnico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'nacionalidad'=>'required|regex:/^[A-Z][a-z]+$/',
            'selectSexo'=>'required',
            'edad'=>'required|numeric|min:1|max:100',
            'fotoTecnico'=>'required|image|dimensions:width=472, height=472',
            'selectCategoria'=>'required',
            'fotoCarnet'=>'required|image',
            'selectRol'=>'required'
        ]);

        $imagenTecnico = $request->file('fotoTecnico')->store('uploads','public');
        $imagenCarnet = $request->file('fotoCarnet')->store('uploads','public');

        $persona = new Persona;
        $persona -> CiPersona = $request -> ci;
        $persona -> NombrePersona = $request -> nombre;
        $persona -> ApellidoPaterno = $request -> apellidoPaterno;
        $persona -> ApellidoMaterno = $request -> apellidoMaterno;
        $persona -> FechaNacimiento = $request -> fechaNacimiento;
        $persona -> NacionalidadPersona = $request -> nacionalidad;
        $persona -> SexoPersona = $request -> selectSexo;
        $persona -> Edad = $request -> edad;
        $persona -> Foto = $imagenTecnico;

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
        $consultaEntrenador = DB::table('tecnicos')
                            ->select('*')
                            ->where([['RolesTecnicos', $rol],['IdEquipo',$request -> idEquipo],['IdCategoria',$request -> selectCategoria]])
                            ->get();

        if(!$consultaEntrenador ->isEmpty()){
            return back()->withInput()->with('mensajeErrorExiste','El entrenador principal ya esta registrado en la categoria');
        }

        $persona -> save();

        $tenico = new CuerpoTecnico;
        $tenico -> IdEquipo = $request -> idEquipo;
        $tenico -> IdCategoria = $request -> selectCategoria;
        $tenico -> IdPersona = $persona -> IdPersona;
        $tenico -> RolesTecnicos = $request -> selectRol;
        $tenico -> FotoCarnet = $imagenCarnet;

        $tenico -> save();
        return redirect('tecnico/create/'.$request -> idEquipo)->with('mensaje','Se inscribio al tecnico correctamente');
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
