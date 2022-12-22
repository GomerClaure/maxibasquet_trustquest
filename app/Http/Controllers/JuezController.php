<?php

namespace App\Http\Controllers;

use App\Models\Juez;
use App\Models\Pais;
use App\Models\User;
use App\Models\Persona;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        
        $roles = array();        
        $roles[0] = Rol::find(3);
        $roles[1] = Rol::find(5);

        return view('juez.create',compact('paises','roles'));
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
            'correo'=>'required|email',
            'contrasenia'=>'required|min:7',
            'foto'=>'required|image|dimensions:width=472, height=472'
        ]);

        $imagenJuez = $request->file('foto')->store('uploads','public');

        $carnetId = $request -> ci;
        $consulta = DB::table('personas')
                        ->select('CiPersona')
                        ->where('CiPersona', $carnetId, 1)
                        ->get();

        if(!$consulta ->isEmpty()){
            return back()->withInput()->with('mensajeErrorExiste','El Ci esta registrado');
        }

        $edadActual = $request -> edad;
        $fecha = $request -> fechaNacimiento;

        $anio = substr($fecha, 0, 4);
        $anioActual = date('Y');

        $mes = substr($fecha, 5, 2);
        $mesActual = date('m');

        $dia = substr($fecha, 8, 2);
        $diaActual = date('d');

        if($mes < $mesActual){
            $edadReal = $anioActual-$anio;
        }else if($mes > $mesActual){
            $edadReal = ($anioActual-$anio)-1;
        }else if($mes == $mesActual){
            if($dia <= $diaActual){
                $edadReal = $anioActual-$anio;
            }else if( $dia > $diaActual){
                $edadReal = ($anioActual-$anio)-1;
            }
        }

        if($edadReal != $edadActual){
            return back()->withInput()->with('mensajeErrorEdad','La edad no coincide con la fecha de nacimiento');
        }

        $usuario = new User;
        $usuario -> IdRol = $request -> selectRol;
        $usuario -> name = $request -> nombreUsuario;
        $usuario -> email = $request -> correo;

        $consultaCorreo = DB::table('users')
                        ->select('email')
                        ->where('email', $request -> correo, 1)
                        ->get();

        if(!$consultaCorreo ->isEmpty()){
            return back()->withInput()->with('mensajeErrorEmail','El correo ya esta registrado');
        }

        $hashed = Hash::make($request -> contrasenia);

        $usuario -> password = $hashed;
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
        $juez -> IdUsuario = $usuario -> id;
        $juez -> IdPersona = $persona -> IdPersona;
        $juez -> save();

        return redirect('juez/create')->with('mensaje','Se registro correctamente');
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
