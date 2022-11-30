<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixturController extends Controller
{
    public function index()
    {
        return 'hola';
    }

    public function show()
    {
        $nombres = DB::table('partidos')
            ->select('NombreEquipo')
            ->join('datos_partidos', 'partidos.IdPartido', '=', 'datos_partidos.IdPartido')
            ->join('equipos', 'datos_partidos.IdEquipo', '=', 'equipos.IdEquipo')
            ->orderBy('FechaPartido')
            ->get();

        $fechas = DB::table('partidos')
            ->select('FechaPartido')
            ->join('datos_partidos', 'partidos.IdPartido', '=', 'datos_partidos.IdPartido')
            ->join('equipos', 'datos_partidos.IdEquipo', '=', 'equipos.IdEquipo')
            ->orderBy('FechaPartido')
            ->get();

        $lugares = DB::table('partidos')
            ->select('LugarPartido', 'FechaPartido')
            ->join('datos_partidos', 'partidos.IdPartido', '=', 'datos_partidos.IdPartido')
            ->join('equipos', 'datos_partidos.IdEquipo', '=', 'equipos.IdEquipo')
            ->orderBy('FechaPartido')
            ->get();
        $horas = DB::table('partidos')
            ->select('HoraPartido', 'FechaPartido')
            ->join('datos_partidos', 'partidos.IdPartido', '=', 'datos_partidos.IdPartido')
            ->join('equipos', 'datos_partidos.IdEquipo', '=', 'equipos.IdEquipo')
            ->orderBy('FechaPartido')
            ->get();

        $estados = DB::table('partidos')
            ->select('EstadoPartido', 'FechaPartido')
            ->join('datos_partidos', 'partidos.IdPartido', '=', 'datos_partidos.IdPartido')
            ->join('equipos', 'datos_partidos.IdEquipo', '=', 'equipos.IdEquipo')
            ->orderBy('FechaPartido')
            ->get();

        $categorias = DB::table('partidos')
            ->select('NombreCategoria', 'FechaPartido')
            ->join('categorias','partidos.IdCategoria','=','categorias.IdCategoria')
            ->join('datos_partidos', 'partidos.IdPartido', '=', 'datos_partidos.IdPartido')
            ->join('equipos', 'datos_partidos.IdEquipo', '=', 'equipos.IdEquipo')
            ->orderBy('FechaPartido')
            ->get();
        //return response()->json($categorias);
        return view("fixtur.mostrar", compact('nombres', 'fechas', 'lugares', 'horas', 'estados','categorias'));
    }
}
