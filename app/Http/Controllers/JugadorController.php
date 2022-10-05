<?php

namespace App\Http\Controllers;

use App\Models\Jugador;

use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Persona;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jugador.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idEquipo = $id;
        $categorias = Categoria::all();
        return view('jugador.create',compact('categorias','idEquipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datos = recuest() -> all();
        //return response()->json($datos);

        $request -> validate([
            'ci'=>'required|numeric|digits_between:6,9',
            'nombre'=>'required|alpha',
            'apellidoPaterno'=>'required|alpha',
            'apellidoMaterno'=>'required|alpha',
            'fechaNacimiento'=>'required|date',
            'nacionalidad'=>'required|alpha',
            'selectSexo'=>'required',
            'edad'=>'required|numeric|min:1|max:120',
            'fotoJugador'=>'required|image|dimensions:width=472, height=472',
            'selectCategoria'=>'required',
            'estatura'=>'required|regex:/^[1-2]{1}[.][0-9]{2}$/',
            'peso'=>'required|numeric|min:1|max:99',
            'fotoCarnet'=>'required|image|dimensions:width=472, height=472',
            'selectPosicion'=>'required',
            'nCamiseta'=>'required|numeric|min:1|max:99'
        ]);

        $imagenJucador = $request->file('fotoJugador')->store('uploads');
        $imagenCarnet = $request->file('fotoCarnet')->store('uploads');

        //$direccionImgJugador = Storage::url($imagenJucador);
        //$direccionImgCarnet = Storage::url($imagenCarnet);

        $persona = new Persona;
        $persona -> CiPersona = $request -> ci;
        $persona -> NombrePersona = $request -> nombre;
        $persona -> ApellidoPaterno = $request -> apellidoPaterno;
        $persona -> ApellidoMaterno = $request -> apellidoMaterno;
        $persona -> FechaNacimiento = $request -> fechaNacimiento;
        $persona -> NacionalidadPersona = $request -> nacionalidad;
        $persona -> SexoPersona = $request -> selectSexo;
        $persona -> Edad = $request -> edad;
        $persona -> Foto = $imagenJucador;
        $persona -> save();

        $jugador = new Jugador;
        $jugador -> IdEquipo = $request -> idEquipo;
        $jugador -> IdCategoria = $request -> selectCategoria;
        $jugador -> IdPersona = $persona -> IdPersona;
        $jugador -> EstaturaJugador = $request -> estatura;
        $jugador -> PesoJugador = $request -> peso;
        $jugador -> FotoCarnet = $imagenCarnet;
        $jugador -> PosicionJugador = $request -> selectPosicion;
        $jugador -> NumeroCamiseta = $request -> nCamiseta;

        $jugador -> save();
        return redirect('jugador/create/'.$request -> idEquipo)->with('mensaje','Se inscribio al jugador correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show(Jugador $jugador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function edit(Jugador $jugador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugador $jugador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jugador $jugador)
    {
        //
    }
}
