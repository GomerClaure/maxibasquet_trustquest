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
use App\Models\Categorias_por_equipo;
use App\Models\Credencial;
use App\Models\Tecnico;

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
                            $f=array("id"=>$categoria);
                            $new=array_push($Cat,$f);
                         }
                       }
                       $EquiposDatos=array("NombreEquipo"=>$var,"Categorias"=>$Cat,"NombrePais"=>$pais,"LogoEquipo"=>$logo);
                       $new=array_push($arreglo,$EquiposDatos);
                       $Cat=[];
                    }
        $s=[];


                    return view('equipo.Equipos',compact('arreglo'));
                  //return $arreglo;
    }

    public function indexDelegado()
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
                            $f=array("id"=>$categoria);
                            $new=array_push($Cat,$f);
                         }
                       }
                       $EquiposDatos=array("NombreEquipo"=>$var,"Categorias"=>$Cat,"NombrePais"=>$pais,"LogoEquipo"=>$logo);
                       $new=array_push($arreglo,$EquiposDatos);
                       $Cat=[];
                    }
        $s=[];


                    return view('equipo.equipoDelegado',compact('arreglo'));
                  //return $arreglo;
    }
    public function listaEquipos(){
        $equipos = Equipo::select()
                   ->join("categorias_por_equipo","categorias_por_equipo.IdEquipo","=","equipos.IdEquipo")
                   ->join("categorias","categorias_por_equipo.IdCategoria","=","categorias.IdCategoria")
                   ->get();
        return $equipos;
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
     * @param  int  $id
     * @param  int  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$categoria)
    {
        $jugadores = Jugador::select("personas.IdPersona")
                    ->join("personas","personas.IdPersona","=","jugadores.IdPersona")
                    ->join("equipos","equipos.IdEquipo","=","jugadores.IdEquipo")
                    ->join("categorias","categorias.IdCategoria","=","jugadores.IdCategoria")
                    ->where("jugadores.IdEquipo",$id)
                    ->where("jugadores.IdCategoria",$categoria)
                    ->get();
        
        foreach ($jugadores as $jugador) {
          $this->eliminarJugador($jugador->IdPersona); 
        }
        
        $tecnicos = Tecnico::select()
                    ->join("personas","personas.IdPersona","=","tecnicos.IdPersona")
                    ->join("equipos","equipos.IdEquipo","=","tecnicos.IdEquipo")
                    ->join("categorias","categorias.IdCategoria","=","tecnicos.IdCategoria")
                    ->where("tecnicos.IdEquipo",$id)
                    ->where("tecnicos.IdCategoria",$categoria)
                    ->get();
        
        foreach ($tecnicos as $tecnico) {
            $this->eliminarTecnico($tecnico->IdPersona);
        }
        
       Categorias_por_equipo::where("IdEquipo",$id)
        ->where("IdCategoria",$categoria)->delete();
        
        $equipo = Categorias_por_equipo::where("IdEquipo",$id)->get();
        if ($equipo->isEmpty()) {
            Equipo::where("IdEquipo",$id)->delete();
        }
    }
    /** Eliminar un jugador  por medio de su idPersona */
    public function eliminarJugador($idPersona){
        Jugador::where("IdPersona",$idPersona)->delete();
        Persona::where("IdPersona",$idPersona)->delete();
        Credencial::where("IdPersona",$idPersona)->delete();
    }
    /**Eliminar miembro del cuerpo técnico por medio de su idPersona  */
    public function eliminarTecnico($idPersona){
        Tecnico::where("IdPersona",$idPersona)->delete();
        Persona::where("IdPersona",$idPersona)->delete();
        Credencial::where("IdPersona",$idPersona)->delete();
    }
}
