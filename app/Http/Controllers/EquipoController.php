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
        
        $eq=Equipo::select('equipos.NombreEquipo') 
                        ->get();

        //Nombre y Pais de un equipo Categoria
        $c=Equipo::select('paises.NombrePais','equipos.NombreEquipo','equipos.LogoEquipo','categorias.NombreCategoria')
                  ->join('aplicaciones','equipos.IdAplicacion','=','aplicaciones.IdAplicacion')
                  ->join('paises','aplicaciones.IdPais','=','paises.IdPais')
                  ->join('categorias_por_equipo','equipos.IdEquipo','=','categorias_por_equipo.IdEquipo')
                  ->join('categorias','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
                  ->get();

        $EquiposDatos=[]; 
        $Cat=[];
        $arreglo=[];
  
                   for($i=0;$i<count($eq);$i++){
                       $var=($eq[$i])["NombreEquipo"];
                       foreach($c as $cop) {
                         $nombre=$cop["NombreEquipo"];
                         if($nombre==$var){
                            $pais=$cop["NombrePais"];
                            $categoria=$cop["NombreCategoria"];
                            $logo=$cop["LogoEquipo"];
                            $new=array_push($Cat,$categoria);
                         }            
                       }
                       $EquiposDatos=array("NombreEquipo"=>$var,"Categorias"=>$Cat,"NombrePais"=>$pais,"LogoEquipo"=>$logo);
                       $new=array_push($arreglo,$EquiposDatos);
                       $Cat=[];
                    }
 
                    return view('equipo.Equipos',compact('arreglo'));
                  //return $arreglo;
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
