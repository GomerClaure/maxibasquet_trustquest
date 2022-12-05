<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Delegado;
use App\Models\Aplicaciones;
use App\Models\Categorias;
use App\Models\Categorias_por_equipo;

class CredencialCategoriaController extends Controller
{
    public function Datos(){

        $idUsuario = auth()->user()->id;
        $idDelegado =Delegado::select('delegados.IdDelegado')
                    ->where('delegados.IdUsuario','=',$idUsuario)
                    ->get();
      
        $equipo= Equipo::select()
                    ->where('equipos.IdDelegado','=',$idDelegado[0]->IdDelegado)
                    ->get()[0];
        
        $idcategoria=Categorias_por_equipo::select('categorias_por_equipo.IdCategoria')
                                            ->where('categorias_por_equipo.IdEquipo','=',$equipo->IdEquipo)
                                            ->get();

        $NomCategorias=[];
        $NomEquipo=$equipo->NombreEquipo;

          foreach($idcategoria as $ca){
              $cat=$ca["IdCategoria"];
              $cate=Categorias::select('categorias.NombreCategoria')
                  ->where('categorias.IdCategoria','=',$cat)
                  ->get();
              $new=array_push($NomCategorias,$cate);
             }
            
      //$NomCategorias=json_encode($NomCategorias);

    return view('MostrarCredenciales.credencialmostrar',compact('NomCategorias','NomEquipo'));
      //return $NomEquipo;
    }
}
