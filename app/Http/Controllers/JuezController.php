<?php

namespace App\Http\Controllers;

use App\Models\Juez;
use App\Models\Pais;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuezController extends Controller
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
        $paises = DB::table('paises')
                ->orderBy('Nacionalidad', 'asc')
                ->get();

        return view('juez.create',compact('paises'));
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
            'nombre'=>'required|min:3|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoPaterno'=>'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoMaterno'=>'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'ci'=>'required|numeric|digits_between:6,9',
            'fechaNacimiento'=>'required|date|before:'.$fechaActual.'|after:'.$fecha.'|regex:/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/',
            'edad'=>'required|numeric|min:1|max:100',
            'nombreUsuario'=>'required|alpha_num|min:4|max:64',
            'correo'=>'required|regex:/^([A-Z,a-z,0-9]+[@][A-Z,a-z]+[.][A-Z,a-z]+)+$/',
            'contrasenia'=>'required|regex:/^([A-Z,a-z,0-9]+)+$/',
            'foto'=>'required|image|dimensions:width=472, height=472'
        ]);

        $imagenJuez = $request->file('foto')->store('uploads','public');

        $carnetId = $request -> ci;
        $consulta2 = DB::table('personas')
                        ->select('CiPersona')
                        ->where('CiPersona', $carnetId, 1)
                        ->get();

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

        /*$rol = 'Entrenador principal';
        if($rol == $request->selectRol){
            $consultaEntrenador = DB::table('tecnicos')
                                ->select('*')
                                ->where([['RolesTecnicos', $rol],['IdEquipo',$id],['IdCategoria',$request -> selectCategoria]])
                                ->get();

            if(!$consultaEntrenador ->isEmpty()){
                return back()->withInput()->with('mensajeErrorExiste','El entrenador principal ya esta registrado en la categoria');
            }
        }*/

        $usuario = new Usuario;
        $usuario -> IdRol = $request -> selectRol;
        $usuario -> name = $request -> nombreUsuario;
        $usuario -> email = $persona -> correo;
        $usuario -> password = $request -> contrasenia;
        $usuario -> save();

        $persona = new Persona;
        $persona -> CiPersona = $request -> ci;
        $persona -> NombrePersona = $request -> nombre;
        $persona -> ApellidoPaterno = $request -> apellidoPaterno;
        $persona -> ApellidoMaterno = $request -> apellidoMaterno;
        $persona -> FechaNacimiento = $request -> fechaNacimiento;
        $persona -> NacionalidadPersona = $request -> selectNacionalidad;
        $persona -> SexoPersona = $request -> selectSexo;
        $persona -> Edad = $request -> edad;
        $persona -> Foto = $imagenJuez;
        $persona -> save();

        $juez = new Juez;
        $juez -> IdUsuario = $usuario -> IdUsuario;
        $juez -> IdPersona = $persona -> IdPersona;
        $juez -> save();

        return redirect('tecnico/create/')->with('mensaje','Se inscribio al tecnico correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function show(Juez $juez)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function edit(Juez $juez)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juez $juez)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juez $juez)
    {
        //
    }
}
