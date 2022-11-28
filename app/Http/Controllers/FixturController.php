<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixturController extends Controller
{
    public function index(){
        return 'hola';
    }

    public function show(){
        $partidos = DB::table('partidos')
        ->select('NombreEquipo','HoraPartido','LugarPartido','FechaPartido')
        ->join('datos_partidos','partidos.IdPartido','=','datos_partidos.IdPartido')
        ->join('equipos','datos_partidos.IdEquipo','=','equipos.IdEquipo')
        ->get();

        //return response()->json($partidos[0]->NombreEquipo);
        return view("fixtur.mostrar",compact('partidos'));
    }
}
