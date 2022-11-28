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
        $nombres = DB::table('partidos')
        ->select('NombreEquipo')
        ->join('datos_partidos','partidos.IdPartido','=','datos_partidos.IdPartido')
        ->join('equipos','datos_partidos.IdEquipo','=','equipos.IdEquipo')
        ->get();

        //return response()->json($nombres);
        return view("fixtur.mostrar",compact('nombres'));
    }
}
