<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class SubirLogoController extends Controller
{
    public function index($id)
    {
        $equipo = Equipo::find($id);
        echo $equipo;
        // echo "Estoy en el controlador para subir logo";
        return view('logo.formularioSubidaLogo',compact('equipo'));
    }
    public function store(Request $request)
    {
        
        return $request;
    }
}
