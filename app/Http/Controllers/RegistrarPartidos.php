<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Partido;
use App\Models\Equipo;

class RegistrarPartidos extends Controller
{
    public function index(){

    }

    public function show(){

    }

    public function store(Request $request)
    {
        //$datos = request()->all();
        $datos = request()->except('_token');
        return response()->json($datos);
    }

    public function create(){
        return view('registrarPartido.create');
    }
}
