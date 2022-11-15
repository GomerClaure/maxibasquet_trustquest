<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tecnico;


class TecnicoQrController extends Controller
{
    public function index ($id)
    {
        echo $id;
        try{
            $tecnico = Tecnico::select('personas.NombrePersona','personas.ApellidoPaterno','personas.ApellidoMaterno',
                                    'personas.Edad','personas.Foto','personas.SexoPersona','personas.FechaNacimiento',
                                    'personas.NacionalidadPersona','tecnicos.RolesTecnicos',
                                    'categorias.NombreCategoria','equipos.NombreEquipo')
                                    ->join('personas','personas.IdPersona','=','tecnicos.IdPersona')
                                    ->join('equipos','equipos.IdEquipo','=','tecnicos.IdEquipo')
                                    ->join('categorias','categorias.IdCategoria','=','tecnicos.IdCategoria')
                                    ->where('IdTecnicos','=',$id)
                                    ->get()[0];
        }catch (\Throwable $th) {
            return back()->withError("Personal del cuerpo técnico no encontrado")->withInput();
        }
        // return $jugador;
        return view("tecnico.datosTecnicoQr", compact('tecnico'));
    }
}
