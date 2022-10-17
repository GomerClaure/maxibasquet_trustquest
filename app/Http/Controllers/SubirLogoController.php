<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubirLogoController extends Controller
{
    public function index()
    {
        // echo "Estoy en el controlador para subir logo";
        return view('logo.formularioSubidaLogo');
    }
}
