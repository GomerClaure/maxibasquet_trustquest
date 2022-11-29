<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\DatoPartido;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Redirect;

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
        

        date_default_timezone_set('America/La_Paz');
        $fechaActual = date('Y-m-d');
        $anio = date('Y') + 2;
        $fecha = $anio . "-01-01";
        $request->validate(
            [
                
                'hora' => 'required',
                'lugar' => 'required|min:6|regex:/^([A-Z][a-z, ]+)+$/',
                'fecha' => 'required',
            ],

        );
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
        if ($request->selectEquipoA == $request->selectEquipoB) {
            return back()->withInput()->with('mensajeErrorEquipos', 'Los equipos no pueden ser iguales');
        }

        //verificar si el mismo equipo no puede jugar el mismo dia 2 veces A
        $partido = DB::table('partidos')
        ->select('FechaPartido','NombreEquipo')
        ->join('datos_partidos','partidos.IdPartido','=','datos_partidos.IdPartido')
        ->join('equipos','datos_partidos.IdEquipo','=','equipos.IdEquipo')
        ->where('equipos.NombreEquipo','=',$equipoA)
        ->where('partidos.FechaPartido','=',$request->fecha)
        ->exists()
        ;

        if($partido){
            //return response()->json('este equipo no peude jugar dos veces el mismo dia');
            return back()->withInput()->with('mensajeErrorFechaMisma','El equipo A no puede jugar mas de una ves el mismo dia');
        }

        //verificar si el mismo equipo no puede jugar el mismo dia 2 veces B
        $partido = DB::table('partidos')
        ->select('FechaPartido','NombreEquipo')
        ->join('datos_partidos','partidos.IdPartido','=','datos_partidos.IdPartido')
        ->join('equipos','datos_partidos.IdEquipo','=','equipos.IdEquipo')
        ->where('equipos.NombreEquipo','=',$equipoB)
        ->where('partidos.FechaPartido','=',$request->fecha)
        ->exists()
        ;

        if($partido){
            //return response()->json($equipoB);
            return back()->withInput()->with('mensajeErrorFechaMisma','El equipo B no puede jugar mas de una ves el mismo dia');

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
            return back()->withInput()->with('mensajeErrorCategoria', 'El Equipo A no pertenece a la categoria');
        }

        $consultaCatEquipoB = DB::table('equipos')
            ->select('NombreCategoria')
            ->join('categorias_por_equipo', 'categorias_por_equipo.IdEquipo', 'equipos.IdEquipo')
            ->join('categorias', 'categorias_por_equipo.IdCategoria', '=', 'categorias.IdCategoria')
            ->where('equipos.NombreEquipo', '=', $equipoB)
            ->where('categorias.NombreCategoria', '=', $categoriaSelecionada)
            ->exists();
        if (!$consultaCatEquipoB) {
            return back()->withInput()->with('mensajeErrorCategoria', 'El Equipo B no pertenece a la categoria');
        }

        //valdiar cantidad de jugadores A
        $jugadores = DB::table('jugadores')
            ->select('*')
            ->where('jugadores.IdEquipo', '=', $idEquipoA->IdEquipo)
            ->where('jugadores.IdCategoria', '=', $idCategoria->IdCategoria)
            ->get();


        if (count($jugadores) < 5) {
            return back()->with('mensajeErrorCantidadJugadores', 'El equipo A no cuenta con la cantidad minima de jugadores');
        }

        //validar cantidad de jugadores B
        $jugadores = DB::table('jugadores')
            ->select('*')
            ->where('jugadores.IdEquipo', '=', $idEquipoB->IdEquipo)
            ->where('jugadores.IdCategoria', '=', $idCategoria->IdCategoria)
            ->get();
            $cantidaJugadores = count($jugadores);
        if ($cantidaJugadores < 5) {
            //return response()->json($request);
            return back()->with('mensajeErrorCantidadJugadores', 'El equipo B no cuenta con la cantidad minima de jugadores');
        }

        //validar lugar fecha partidos
        $obtenerPartido = DB::table('partidos')
            ->where('partidos.LugarPartido', $request->lugar)
            ->where('partidos.HoraPartido', $request->hora)
            ->where('partidos.FechaPartido', $request->fecha)
            ->exists();
        if ($obtenerPartido) {
            //return response()->json('el partido ya existen');
            return back()->with('mensajeErrorMismoPartido', 'El partido ya esta registrado en la misma hora,fecha,lugar');
        }

        //validar la hora del partido que no sean el mismo
        $obtenerPartido2 = DB::table('partidos')
            ->where('partidos.LugarPartido', $request->lugar)
            ->where('partidos.FechaPartido', $request->fecha)
            ->get();
        //return response()->json($obtenerPartido2);
        foreach ($obtenerPartido2 as $hora) {
            if (substr($hora->HoraPartido, 0, 2) == substr($request->hora, 0, 2)) {
                //return response()->json($hora->HoraPartido);
                if (!empty($obtenerPartido2)) {
                    $horaPartidoMin = $hora->HoraPartido;
                    $horas = (int)substr($horaPartidoMin, 0, 2);
                    $minutos = (int)substr($horaPartidoMin, 3, 6);
                    $horaActualMax = new DateTime();
                    $horaActualMin = new DateTime();
                    $horaActualMin->setTime($horas, $minutos);
                    $horaActualMax->setTime($horas, $minutos);
                    $horaActualMax->modify('+1 hours');
                    if ($horaActualMin->format('H:i') < $request->hora && $horaActualMax->format('H:i') > $request->hora) {
                        //return response()->json('hora invalida');
                        return back()->withInput()->with('mensajeErrorHoraMin', 'la hora y minutos son inavalidos');
                    }
                }
            }
        }
        
        


        $obtenerPartido = DB::table('partidos')
            ->where('partidos.LugarPartido', $request->lugar)
            ->where('partidos.HoraPartido', $request->hora)
            ->where('partidos.FechaPartido', $request->fecha)
            ->exists();

        //validar fecha
        $fechaPrevista = $request->fecha;
        $fechaHoy = Carbon::now();
        if ($fechaHoy > $fechaPrevista) {
            return back()->withInput()->with('mensajeErrorFecha', 'La fecha no esta permitida');
        }


        //validar la hora
        $horaMin = new DateTime('2001-01-01');
        $horaMax = new DateTime('2001-01-01');
        $horaMin->setTime(9, 00);
        $horaMax->setTime(22, 00);
        $formatoMin = $horaMin->format('H:i');
        $formatoMax = $horaMax->format('H:i');
        $horaPrevista = $request->hora;
        if ($formatoMin > $horaPrevista || $formatoMax < $horaPrevista) {
            //return response()->json("la hora es invalida");
            return back()->withInput()->with('mensajeErrorHora', 'La hora no esta permitida');
        }

        $id = DB::table('categorias')
            ->select('*')
            ->where('categorias.NombreCategoria', $request->selectCategoria)
            ->first();
        //return response()->json($id);
        $nuevoPartido = new Partido;
        $nuevoPartido->IdCategoria = $id->IdCategoria;
        $nuevoPartido->HoraPartido = $request->hora;
        $nuevoPartido->FechaPartido = $request->fecha;
        $nuevoPartido->LugarPartido = $request->lugar;
        $nuevoPartido->EstadoPartido = 'espera';
        $nuevoPartido->save();


        $datosEquipoA = new DatoPartido;
        $datosEquipoA->IdEquipo = $idEquipoA->IdEquipo;
        $datosEquipoA->IdPartido = $nuevoPartido->IdPartido;
        $datosEquipoA->ScoreEquipo = 0;
        $datosEquipoA->save();

        $datosEquipoB = new DatoPartido;
        $datosEquipoB->IdEquipo = $idEquipoB->IdEquipo;
        $datosEquipoB->IdPartido = $nuevoPartido->IdPartido;
        $datosEquipoB->ScoreEquipo = 0;
        $datosEquipoB->save();


        return redirect('/registrarPartidos/create')->with('mensajeValidoRegistro', 'Se registro el partido');
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
