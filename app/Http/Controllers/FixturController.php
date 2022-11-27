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
        ->select('*')
        ->get();
        //return response()->json($partidos);
        return view("fixtur.mostrar",compact('partidos'));
    }
}
