<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Delegado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubirLogoController extends Controller
{
    public function index()
    {
        $idUsuario = auth()->user()->id;
        $idDelegado =Delegado::select('delegados.IdDelegado')
                    ->where('delegados.IdUsuario','=',$idUsuario)
                    ->get();

        $equipo= Equipo::where('equipos.IdDelegado','=',$idDelegado[0]->IdDelegado)
                    ->get()[0];
        $id=$equipo->IdEquipo;                                  
        //Nombre y Pais de un equipo Categoria
        $c=Equipo::select('paises.NombrePais','equipos.NombreEquipo','categorias.NombreCategoria','equipos.IdDelegado')
                  ->where('equipos.IdEquipo','=',$id)
                  ->join('aplicaciones','equipos.IdAplicacion','=','aplicaciones.IdAplicacion')
                  ->join('paises','aplicaciones.IdPais','=','paises.IdPais')
                  ->join('categorias_por_equipo','equipos.IdEquipo','=','categorias_por_equipo.IdEquipo')
                  ->join('categorias','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
                  ->get();
        //echo $equipo;
        return view('logo.formularioSubidaLogo',compact('equipo','id','c'));
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
        return redirect('subirLogo');
        // return $request;
    }

}
