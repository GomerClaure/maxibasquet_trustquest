<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\DatoPartido;
use Carbon\Carbon;
use DateTime;

class RegistrarPartidosController extends Controller
{
    public function index()
    {
    }

    public function show()
    {
    }

    public function store(Request $request)
    {

        //$datos = request()->all();
        date_default_timezone_set('America/La_Paz');
        $fechaActual = date('Y-m-d');
        $anio = date('Y') + 2;
        $fecha = $anio . "-01-01";
        /*$request->validate(
            [
                
                'hora' => 'required',
                'lugar' => 'required|min:6|regex:/^([A-Z][a-z, ]+)+$/',
                'fecha' => 'required',
            ],

        );*/
        $categoria = $request->selectCategoria;
        //ids
        $equipoA = $request->selectEquipoA;
        $equipoB = $request->selectEquipoB;
        $idEquipoA = DB::table('equipos')
            ->where('NombreEquipo', $equipoA)
            ->first();
        $idEquipoB = DB::table('equipos')
            ->where('NombreEquipo', $equipoB)
            ->first();
        $idCategoria = DB::table('categorias')
            ->where('NombreCategoria', $categoria)
            ->first();

        //verificar que los equipos no sean los mismos 
        /* if ($request->selectEquipoA == $request->selectEquipoB) {
            return back()->withInput()->with('mensajeErrorEquipos', 'Los equipos no pueden ser iguales');
        }

        //verificar la existencia del equipoA

        $consultaEquipoA = DB::table('equipos')
            ->select('*')
            ->where('NombreEquipo', $equipoA)
            ->exists();
        if (!$consultaEquipoA) {
            return back()->withInput()->with('mensajeErrorEquipoA', 'El Equipo A no existe');
        }

        //verificar la existencia del equipo B

        $consultaEquipoB = DB::table('equipos')
            ->select('*')
            ->where('NombreEquipo', $equipoB)
            ->exists();
        if (!$consultaEquipoB) {
            return back()->withInput()->with('mensajeErrorEquipoB', 'El Equipo B no existe');
        }

        //verificar que los equipos que pertenezcan a la categoria seleccionada

        $categoriaSelecionada = $request->selectCategoria;
        $consultaCatEquipoA = DB::table('equipos')
            ->select('NombreCategoria')
            ->join('categorias_por_equipo', 'categorias_por_equipo.IdEquipo', 'equipos.IdEquipo')
            ->join('categorias', 'categorias_por_equipo.IdCategoria', '=', 'categorias.IdCategoria')
            ->where('equipos.NombreEquipo', '=', $equipoA)
            ->where('categorias.NombreCategoria', '=', $categoriaSelecionada)
            ->exists();
        if (!$consultaCatEquipoA) {
            return back()->withInput()->with('mensajeErrorCategoriaA', 'El Equipo A no pertenece a la categoria');
        }

        $consultaCatEquipoB = DB::table('equipos')
            ->select('NombreCategoria')
            ->join('categorias_por_equipo', 'categorias_por_equipo.IdEquipo', 'equipos.IdEquipo')
            ->join('categorias', 'categorias_por_equipo.IdCategoria', '=', 'categorias.IdCategoria')
            ->where('equipos.NombreEquipo', '=', $equipoB)
            ->where('categorias.NombreCategoria', '=', $categoriaSelecionada)
            ->exists();
        if (!$consultaCatEquipoB) {
            return back()->withInput()->with('mensajeErrorCategoriaB', 'El Equipo B no pertenece a la categoria');
        }*/

        //valdiar cantidad de jugadores A
        $jugadores = DB::table('jugadores')
            ->select('*')
            ->where('jugadores.IdEquipo', '=', $idEquipoA->IdEquipo)
            ->where('jugadores.IdCategoria', '=', $idCategoria->IdCategoria)
            ->get();

        if (count($jugadores) < 5) {
            //return response()->json(count($jugadores));
            return back()->whithInput()->with('mensajeErrorCantidadJugadoresA', 'El equipo A no cuenta con la cantidad minima de jugadores');
        }

        //validar cantidad de jugadores B
        $jugadores = DB::table('jugadores')
            ->select('*')
            ->where('jugadores.IdEquipo', '=', $idEquipoB->IdEquipo)
            ->where('jugadores.IdCategoria', '=', $idCategoria->IdCategoria)
            ->get();

        if (count($jugadores) < 5) {
            //return response()->json(count($jugadores));
            return back()->whithInput()->with('mensajeErrorCantidadJugadoresB', 'El equipo B no cuenta con la cantidad minima de jugadores');
        }

        //validar lugar fecha partidos
        /*$obtenerPartido = DB::table('partidos')
        ->where('partidos.LugarPartido',$request->lugar)
        ->where('partidos.HoraPartido',$request->hora)
        ->where('partidos.FechaPartido',$request->fecha)
        ->exists();
        if($obtenerPartido){
            //return response()->json('el partido ya existen');
            return back()->whitInput()->with('mesajeErrorMismoPartido','El que partido ya esta registrado');
        }*/

        //validar la hora del partido que no sean el mismo
       /*$obtenerPartido2 = DB::table('partidos')
            ->where('partidos.LugarPartido', $request->lugar)
            ->where('partidos.FechaPartido', $request->fecha)
            ->first();
        $horaPartidoMin = $obtenerPartido2->HoraPartido;
        $horas = (int)substr($horaPartidoMin, 0, 2);
        $minutos = (int)substr($horaPartidoMin, 3,6 );
        $horaActualMax = new DateTime();
        $horaActualMin = new DateTime();
        $horaActualMin->setTime($horas, $minutos);
        $horaActualMax->setTime($horas , $minutos);
        $horaActualMax->modify('+1 hours');
        if ($horaActualMin->format('H:i') < $obtenerPartido2->HoraPartido||$horaActualMax->format('H:i')>$obtenerPartido2->HoraPartido) {
            //return response()->json("la hora no vlaida");
            return back()->withInput()->with('mensajeErrorHoraMin','la hora y minutos son inavalidos');
        }*/

        $obtenerPartido = DB::table('partidos')
        ->where('partidos.LugarPartido',$request->lugar)
        ->where('partidos.HoraPartido',$request->hora)
        ->where('partidos.FechaPartido',$request->fecha)
        ->exists();

        //validar fecha
        /*$fechaPrevista = $request->fecha;
        $fechaHoy = Carbon::now();
        if ($fechaHoy > $fechaPrevista) {
            return back()->withInput()->with('mensajeErrorFecha', 'La fecha no esta permitida');
        }*/


        //validar la hora
        /*$horaMin = new DateTime('2001-01-01');
        $horaMax = new DateTime('2001-01-01');
        $horaMin -> setTime(9,00);
        $horaMax -> setTime(22,00);
        $formatoMin = $horaMin->format('H:i');
        $formatoMax = $horaMax->format('H:i');
        $horaPrevista = $request->hora;
        if ($formatoMin>$horaPrevista||$formatoMax<$horaPrevista) {
            //return response()->json("la hora es invalida");
            return back()->withInput()->with('mensajeErrorHora', 'La hora no esta permitida');
        }*/

        /*$nuevoPartido = new Partido;
        $nuevoPartido->IdCategoria = 1;
        $nuevoPartido->HoraPartido = $request->hora;
        $nuevoPartido->FechaPartido = $request->fecha;
        $nuevoPartido->LugarPartido = $request->lugar;
        $nuevoPartido->EstadoPartido = 'espera';
        $nuevoPartido->save();*/


         $datosEquipoA = new DatoPartido;
        $datosEquipoA->IdEquipo = 1;
        $datosEquipoA->IdPartido = 1;
        $datosEquipoA->ScoreEquipo = 0;
        $datosEquipoA->save();

        $datosEquipoB = new DatoPartido;
        $datosEquipoB->IdEquipo = 2;
        $datosEquipoB->IdPartido = 1;
        $datosEquipoB->ScoreEquipo = 0;
        $datosEquipoA->save();


        //return redirect('/registrarPartidos/create');
        //return response()->json($formatoMin);
    }

    public function create()
    {
        $equipos = DB::table('equipos')
            ->select('NombreEquipo')
            ->orderBy('NombreEquipo', 'ASC')
            ->get();

        $categorias = DB::table('categorias')
            ->select('NombreCategoria')
            ->get();
        return view('registrarPartido.create', compact('categorias', 'equipos'));
    }
}
