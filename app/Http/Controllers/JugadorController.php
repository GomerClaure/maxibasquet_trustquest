<?php

namespace App\Http\Controllers;

use App\Models\Jugador;

use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Persona;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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
        $jugadores = DB::table('jugadores')
                            ->select('IdCategoria')
                            ->where('IdEquipo',$id)
                            ->distinct()
                            ->get();

        $arreglo = array();
        $contador = 0;
        foreach ($jugadores as $categoria) {
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

        return view('jugador.create',compact('categorias','id','paises'));
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
            'fotoJugador'=>'required|image|dimensions:width=472, height=472',
            'selectCategoria'=>'required',
            'estatura'=>'required|regex:/^[1-2]{1}[.][0-9]{2}$/',
            'peso'=>'required|numeric|min:1|max:99',
            'fotoCarnet'=>'required|image',
            'selectPosicion'=>'required',
            'nCamiseta'=>'required|numeric|min:1|max:99'
        ]);

        $imagenJucador = $request->file('fotoJugador')->store('uploads','public');
        $imagenCarnet = $request->file('fotoCarnet')->store('uploads','public');

        //$direccionImgJugador = Storage::url($imagenJucador);
        //$direccionImgCarnet = Storage::url($imagenCarnet);

        $persona = new Persona;
        $persona -> CiPersona = $request -> ci;
        $persona -> NombrePersona = $request -> nombre;
        $persona -> ApellidoPaterno = $request -> apellidoPaterno;
        $persona -> ApellidoMaterno = $request -> apellidoMaterno;
        $persona -> FechaNacimiento = $request -> fechaNacimiento;
        $persona -> NacionalidadPersona = $request -> selectNacionalidad;
        $persona -> SexoPersona = $request -> selectSexo;
        $persona -> Edad = $request -> edad;
        $persona -> Foto = $imagenJucador;

        $carnetId = $request -> ci;
        //$consulta2 = DB::select("select * from personas where personas.CiPersona = '$carnetId'");
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

        $categoria = $request -> selectCategoria;
        $consulta = Categoria::where('IdCategoria',$categoria)->get();
        $categoriaNum = substr($consulta[0]->NombreCategoria, 1, 3);

        if($edadActual < $categoriaNum){
            return back()->withInput()->with('mensajeErrorCategoria','La edad del jugador es inferior a la categoria elegida');
        }

        $numCamiseta = $request -> nCamiseta;
        $consultaCamiseta = DB::table('jugadores')
                            ->select('*')
                            ->where([['NumeroCamiseta', $numCamiseta],['IdEquipo',$request -> idEquipo],['IdCategoria',$request -> selectCategoria]])
                            ->get();

        if(!$consultaCamiseta ->isEmpty()){
            return back()->withInput()->with('mensajeErrorCamiseta','El numero de camiseta ya esta registrado en la categoria');
        }

        $persona -> save();

        $jugador = new Jugador;
        $jugador -> IdEquipo = $id;
        $jugador -> IdCategoria = $request -> selectCategoria;
        $jugador -> IdPersona = $persona -> IdPersona;
        $jugador -> EstaturaJugador = $request -> estatura;
        $jugador -> PesoJugador = $request -> peso;
        $jugador -> FotoCarnet = $imagenCarnet;
        $jugador -> PosicionJugador = $request -> selectPosicion;
        $jugador -> NumeroCamiseta = $request -> nCamiseta;

        $jugador -> save();
        return redirect('jugador/create/'.$id)->with('mensaje','Se inscribio al jugador correctamente');
    }
    /**
     * Obtine la lista de jugadores correspondientes a un equipo y categoria
     */
    public function listaJugadores($equipo,$categoria){
        $jugadores = Jugador::select('personas.NombrePersona','personas.ApellidoPaterno',
                    'jugadores.PosicionJugador','jugadores.IdJugador','personas.Foto','jugadores.NumeroCamiseta')
                     ->join('personas','jugadores.IdPersona','=','personas.IdPersona')
                    ->join('equipos','jugadores.IdEquipo','=','equipos.IdEquipo')
                    ->join('categorias','jugadores.IdCategoria','categorias.IdCategoria')
                    ->where('equipos.NombreEquipo','=',$equipo)
                    ->where('categorias.NombreCategoria','=',$categoria)
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
        return view('jugador.lista',compact('jugadores','equipo','categoria'));
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
        return view('jugador.datosJugador',compact('jugador'));
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
