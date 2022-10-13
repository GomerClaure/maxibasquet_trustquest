<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MostrarJugadoresController extends Controller
{
    public function index()
    {   
    
             return view('equipo.MostrarJugadores');       
    }                             
}
