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

        $fecha = $request -> fechaNacimiento;
        $anio = substr($fecha, 0, 4);
        $edadReal = date('Y')-$anio;
        $edadActual = $request -> edad;
        if($edadReal != $edadActual){
            return redirect('jugador/create/'.$request -> idEquipo)->with('mensajeErrorEdad',' La edad no coincide con la fecha de nacimiento');
        }

        $categoria = $request -> selectCategoria;
        $consulta = Categoria::where('IdCategoria',$categoria)->get();
        $categoriaNum = substr($consulta[0]->NombreCategoria, 1, 3);

        if($edadActual < $categoriaNum){
            return redirect('jugador/create/'.$request -> idEquipo)->with('mensajeErrorCategoria',' La edad del jugador es inferior a la categoria elegida');
        }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $jugador = Jugador::select('personas.NombrePersona','personas.ApellidoPaterno','personas.FechaNacimiento',
                                'personas.Edad','personas.Foto','jugadores.PesoJugador','jugadores.EstaturaJugador',
                                'jugadores.PosicionJugador','jugadores.NumeroCamiseta','personas.NacionalidadPersona',
                                'categorias.NombreCategoria','equipos.NombreEquipo')
                                ->join('personas','personas.IdPersona','=','jugadores.IdPersona')
                                ->join('equipos','equipos.IdEquipo','=','jugadores.IdEquipo')
                                ->join('categorias','categorias.IdCategoria','=','jugadores.IdCategoria')
                                ->where('IdJugador','=',$id)
                                ->get();

        $jugador = $this->formatoFecha($jugador);
        if ($id <= 0 || $id >= 9000000000000000000 || $jugador->isEmpty()) {
                $mensaje ="No encontrado";
                return $mensaje;
                                }
        return view('datosJugador',compact('jugador'));
    }
    /**
     * Cambia el formato de la fecha de A-M-D a D/M/A
     */
    public function formatoFecha($jugador){
        if (!$jugador->isEmpty()) {
            foreach($jugador as $jug){
                $fechas=explode( "-",$jug->FechaNacimiento);
                $formato=$fechas[2]."/".$fechas[1]."/".$fechas[0];
                $jug->FechaNacimiento=$formato;
            }
        }

        return $jugador;
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
