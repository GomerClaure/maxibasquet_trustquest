<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubirLogoController extends Controller
{
    public function index($id)
    {
        $equipo = Equipo::find($id);
        // echo $equipo;
        return view('logo.formularioSubidaLogo',compact('equipo','id'));
    }
    public function store(Request $request)
    {
        $request -> validate([
            'logotipoDelEquipo'=>['required','image','max:5000']
        ],$message =['max'=> 'La imagen es muy pesada, no debe exceder los 5Mb']);
        $formulario=request()->except('_token');
        $id = $formulario['idEquipo'];
        $equipo = Equipo::find($id);
        $formulario['logotipoDelEquipo'] = $request->file('logotipoDelEquipo')->store('uploads','public');
        // echo $formulario['logotipoDelEquipo'];
        Storage::disk('public')->delete('/'.($equipo->LogEquipo));
        $equipo->LogoEquipo = $formulario['logotipoDelEquipo'];
        $equipo->save();
        return redirect('subirLogo/'.$id);
        // return $request;
    }
}
