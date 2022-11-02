<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MostrarTecnicosController extends Controller
{
    //
    public function index()
    {   
             return view('equipo.MostrarCuerpoT');
             
    }       
}
