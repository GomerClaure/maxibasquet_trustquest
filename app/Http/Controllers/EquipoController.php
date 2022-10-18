<?php

namespace App\Http\Controllers;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Persona;
use App\Models\Tecnicos;
use App\Models\Aplicaciones;
use App\Models\Categoria;
use App\Models\Paises;
use App\Models\CategoriaEquipo;

class EquipoController extends Controller
{
    public function index()
    {   
        
        $funciona=Equipo::select('equipos.NombreEquipo') 
                        ->get();

        //Nombre y Pais de un equipo
        $c=Equipo::select('paises.NombrePais','equipos.NombreEquipo','equipos.LogoEquipo')
                  ->join('aplicaciones','equipos.IdAplicacion','=','aplicaciones.IdAplicacion')
                  ->join('paises','aplicaciones.IdPais','=','paises.IdPais')
                  //,'categorias.NombreCategoria'
                  //->join('categorias_por_equipo','equipos.IdEquipo','=','categorias_por_equipo.IdEquipo')
                  //->join('categorias','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
                  ->get();
             //return view('equipo.Equipos',compact('c'));
        $equipos=Categoria::select('categorias.NombreCategoria','equipos.NombreEquipo')
                                 ->join('categorias_por_equipo','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
                                 ->join('equipos','equipos.IdEquipo','=','categorias_por_equipo.IdEquipo')
                                 //->where('equipos.NombreEquipo','=',)
                                 ->get();     
            //return $funciona;   
            $arregloCategorias=[];

        for($i=0;$i<count($equipos)-1;$i++){
            $aux= $equipos[$i]; 
            $aux1=$equipos[$i+1];
            if($aux["NombreEquipo"]==$aux1["NombreEquipo"]){
                 $a=$aux["NombreCategoria"];
                 $b=$aux1["NombreCategoria"];
                 $new=array_push($arregloCategorias,$a,$b);
            }

        }

        return $arregloCategorias;
            /*
        for($x=0;$x<count($funciona);$x++){
            for($j=0;$j<count($equipos);$j++){
                 $aux= $funciona[$x]; 
                 $aux1=$equipos[$j];
                 $comp= $aux["NombreEquipo"];
                 $comp1=$aux1["NombreEquipo"]; 
                if($comp==$comp1){
                    echo $aux1["NombreEquipo"];
                    echo $aux1["NombreCategoria"];
                } 
            }
        }*/
        

         //return $equipos ;
             
       
    }                             
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
