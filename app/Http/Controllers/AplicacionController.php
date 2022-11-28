<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplicacion;

class AplicacionController extends Controller
{

    /**
     * Muestra la lista de aplicaciones de preinscripcion que fueron aceptadas o estan Pendientes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplicaciones = Aplicacion::select('aplicaciones.IdAplicacion','aplicaciones.NombreEquipo','preinscripciones.Monto','aplicaciones.EstadoAplicacion','aplicaciones.Categorias')
                    ->join('preinscripciones','aplicaciones.IdPreinscripcion','=','preinscripciones.IdPreinscripcion')
                    ->join('transacciones','aplicaciones.IdAplicacion','=','transacciones.IdAplicacion')
                    ->where("EstadoAplicacion","=","Pendiente")
                    ->orWhere("EstadoAplicacion","=","Aceptado") 
                    ->orderBy('aplicaciones.NombreEquipo')
                    ->get();

        $aplicaciones = $this->ingresarMonto($aplicaciones);
        
        return view("aplicacion.listaAplicaciones",compact('aplicaciones'));
    }
    /**
     * Crea un nuevo arreglo con los datos de las apliaciones junto con el Total a pagar
     * correpondiente a la cantidad de categorias
    */
     private function ingresarMonto($aplicaciones){
        $arreglo=array();
        if (!$aplicaciones->isEmpty()) {
            foreach($aplicaciones as $aplicacion){
                $categorias = $this->separar($aplicacion->Categorias);
                $total = sizeof($categorias) * $aplicacion-> Monto;
                $aplicacion->Total=$total;
                array_push($arreglo,$aplicacion);
            }
        }
        return $arreglo;
     }

    /**
     * Separa un string con comas
     */
    private function separar($categorias){
        return explode(",",$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aplicaciones = Aplicacion::select(
            'aplicaciones.NombreUsuario',
           'aplicaciones.CorreoElectronico',
           'aplicaciones.NumeroTelefono',
           'aplicaciones.NombreEquipo',
           'aplicaciones.Categorias',
            'transacciones.NumeroTransaccion',
            'transacciones.NumeroCuenta',
            'transacciones.MontoTransaccion',
            'transacciones.FechaTransaccion',
            'transacciones.FotoVaucher',
            'paises.NombrePais'
        )
        ->join('transacciones', 'aplicaciones.IdAplicacion', '=', 'transacciones.IdAplicacion',)
        ->join('paises','aplicaciones.IdPais','=','paises.IdPais')
        ->where('aplicaciones.IdAplicacion','=',$id)
        ->get();
    
    
    if (! $aplicaciones->isEmpty()) {
        $aplicacion = $aplicaciones[0];
        $categorias = $this->separar($aplicacion->Categorias);
        $aplicacion->Categorias=$categorias;
    }else{
        $aplicacion = null;
    }
    
    return view("aplicacion.detallesAplicacion",compact('aplicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
