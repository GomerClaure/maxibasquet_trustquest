<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\DatoPartido;
use Carbon\Carbon;

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
        $categorias = array(
            "1" => "+30",
            "2" => "+35",
            "3" => "+40",
            "4" => "+45",
            "5" => "+50",
            "6" => "+55",
            "7" => "+60",
        );
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

        //verificar que los equipos no sean los mismos 
        if ($request->selectEquipoA == $request->selectEquipoB) {
            return back()->withInput()->with('mensajeErrorEquipos', 'Los equipos no pueden ser iguales');
        }

        //verificar la existencia del equipoA
        $equipoA = $request->selectEquipoA;
        $consultaEquipoA = DB::table('equipos')
            ->select('*')
            ->where('NombreEquipo', $equipoA)
            ->exists();
        if (!$consultaEquipoA) {
            return back()->withInput()->with('mensajeErrorEquipoA', 'El Equipo A no existe');
        }

        //verificar la existencia del equipo B
        $equipoB = $request->selectEquipoB;
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
        }


        //validar fecha
        $fechaPrevista = $request->fecha;
        $fechaHoy = Carbon::now();
        if ($fechaHoy > $fechaPrevista) {
            return back()->withInput()->with('mensajeErrorFecha', 'La fecha no esta permitida');
        }


        //validar la hora
        $hora1 = date('08:00');
        $hora2 = date('07:00');
        $hora3 = date('06:00');
        $hora4 = date('04:00');
        $hora5 = date('03:00');
        $hora6 = date('02:00');
        $hora7 = date('01:00');
        $hora8 = date('22:00');
        $hora9 = date('23:00');
        $horaMax = date('22:00');
        $horaNul = date('00:00');
        $horaPrevista = $request->hora;
        if ($horaNul == $horaPrevista || $horaPrevista == $hora1 || $horaPrevista == $hora2 || $horaPrevista == $hora3 || $horaPrevista == $hora4 || $horaPrevista == $hora5 || $horaPrevista == $hora6 || $horaPrevista == $hora7 || $horaPrevista == $hora8 || $horaPrevista == $hora9) {
            return back()->withInput()->with('mensajeErrorHora', 'La hora no esta permitida');
        }

        $datos = request()->except('_token');
        $nuevoPartido = new Partido;
        $nuevoPartido->HoraPartido = $request->hora;
        $nuevoPartido->FechaPartido = $request->fecha;
        $nuevoPartido->LugarPartido = $request->lugar;
        $nuevoPartido->EstadoPartido = 'espera';
        $nuevoPartido->save();

        $idEquipoA = Equipo::find('equipoA');
        $idEquipoB = Equipo::find('equipoB');

        $datosEquipoA = new DatoPartido;
        $datosEquipoA->IdEquipo = $idEquipoA->IdEquipo;
        $datosEquipoA->IdPartido = $nuevoPartido->IdPartido;
        $datosEquipoA->ScoreEquipo = 0;
        $datosEquipoA->save();

        $datosEquipoB = new DatoPartido;
        $datosEquipoB->IdEquipo = $idEquipoB->IdEquipo;
        $datosEquipoB->IdPartido = $nuevoPartido->IdPartido;
        $datosEquipoB->ScoreEquipo = 0;
        $datosEquipoA->save();


        //return redirect('/registrarPartidos/create');
        return response()->json($request);
    }

    public function create()
    {
        $equipos = DB::table('equipos')
            ->select('NombreEquipo')
            ->orderBy('NombreEquipo','ASC')
            ->get();

        $categorias = DB::table('categorias')
            ->select('NombreCategoria')
            ->get();
        return view('registrarPartido.create', compact('categorias','equipos'));
    }
}
