<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Partido;
use App\Models\Equipo;

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
        $anio = date('Y') - 100;
        $fecha = $anio . "-01-01";
        $request->validate(
            [
                'equipoA' => 'required',
                'equipoB' => 'required',
                'hora' => 'required',
                'lugar' => 'required',
                'fecha' => 'required',
                'option' => 'required',
            ],
           
        );

        //verificar la existencia del equipoA
        $equipoA = $request ->equipoA;
        $consultaEquipoA = DB::table('equipos')
                            ->select('NombreEquipo')
                            ->where('NombreEquipo',$equipoA)
                            ->exists();
        if(!$consultaEquipoA){
            return back()->withInput()->with('mensajeErrorEquipoA','El Equipo A no existe');
        }

        //verificar la existencia del equipo B
        $equipoB = $request ->equipoB;
        $consultaEquipoB = DB::table('equipos')
                            ->select('NombreEquipo')
                            ->where('NombreEquipo',$equipoB)
                            ->exists();
        if(!$consultaEquipoB){
            return back()->withInput()->with('mensajeErrorEquipoB','El Equipo B no existe');
        }

        
        $fecha = $request->fecha;
        $anio = substr($fecha, 0, 4);
        $edadReal = date('Y') - $anio;
        $edadActual = $request->edad;
        /*if ($edadReal != $edadActual) {
            return back()->withInput()->with('mensajeErrorFecha', 'La edad no coincide con la fecha de nacimiento');
        }*/

        $datos = request()->except('_token');
        $nuevoPartido = new Partido;
        $nuevoPartido->HoraPartido = $request->hora;
        $nuevoPartido->FechaPartido = $request->fecha;
        $nuevoPartido->LugarPartido = $request->lugar;
        $nuevoPartido->EstadoPartido = 'espera';
        $nuevoPartido->save();
        return response()->json($datos);
    }

    public function create()
    {
        return view('registrarPartido.create');
    }
}
