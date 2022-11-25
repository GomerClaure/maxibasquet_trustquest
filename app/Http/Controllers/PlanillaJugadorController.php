<?php

namespace App\Http\Controllers;

use App\Models\PlanillaJugador;
use App\Models\Persona;
use App\Models\Jugador;
use App\Models\Falta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanillaJugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idPartido)
    {
        $idPlanilla = DB::table('planilla_jugadores')
                        ->select('IdPlanillaJugador')
                        ->where('IdPartido',$idPartido)
                        ->get(); 
        $idPlanillaJugador = $idPlanilla[0] -> IdPlanillaJugador;

        $faltas = DB::table('faltas')
                        ->select('*')
                        ->where('IdPlanillaJugador',$idPlanillaJugador)
                        ->get(); 

        $arregloEquipoA = DB::table('jugadores')
                            ->select('*')
                            ->where('IdEquipo',1)
                            ->where('IdCategoria',1)
                            ->get();

        $personasA = array();
        $contador = 0;
        foreach ($arregloEquipoA as $jugador){
            $personasA[$contador] = Persona::find($jugador->IdPersona);
            $contador++;
        }

        $arregloEquipoB = DB::table('jugadores')
                            ->select('*')
                            ->where('IdEquipo',2)
                            ->where('IdCategoria',1)
                            ->get();

        $personasB = array();
        $contador = 0;
        foreach ($arregloEquipoB as $jugador){
            $personasB[$contador] = Persona::find($jugador->IdPersona);
            $contador++;
        }

        
        return view("planillaJugador.index",compact('arregloEquipoA','personasA','arregloEquipoB','personasB','idPartido','idPlanillaJugador','faltas'));
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
    public function store(Request $request, $idPartido, $idPlanillaJugador, $id)
    {
        $selectFalta = "";
        $selectTiroLibre = "";
        if($request -> selectFalta1 == "vacio"){
            if($request -> selectTiroLibre1 == "vacio"){
                for($j=2; $j<=5; $j++){
                    $select = 'selectFalta'.$j;
                    $select2 = 'selectTiroLibre'.$j;
                    if($request -> $select != "vacio" || $request -> $select2 != "vacio"){
                        return back()->withInput()->with('mensajeErrorOrdenIngreso','Las faltas no fueron ingresadas en orden');
                    }
                }
                return back()->withInput()->with('mensajeNingunDato','No se agrego ningun dato');  
            }else{
                return back()->withInput()->with('mensajeDatosNoCompletos','Los datos de la falta no estan completas');
            }
            
        }else if($request -> selectTiroLibre1 != "vacio"){
            for($i=2; $i<=5; $i++){
                $select = 'selectFalta'.$i;
                $select2 = 'selectTiroLibre'.$i;
                if($request -> $select == "vacio" && $request -> $select2 == "vacio"){
                    $selectActual = 'selectFalta'.($i-1);
                    $selectFalta = $request -> $selectActual;

                    $selectActual2 = 'selectTiroLibre'.($i-1);
                    $selectTiroLibre = $request -> $selectActual2;
                    
                    for($j=$i+1; $j<=5; $j++){
                        $select = 'selectFalta'.$j; 
                        $select2 = 'selectTiroLibre'.$j;
                        if($request -> $select != "vacio" || $request -> $select2 != "vacio"){
                            return back()->withInput()->with('mensajeErrorOrdenIngreso','Las faltas no fueron ingresadas en orden');
                        }
                    }
                    $i=6;
                }else if($request -> $select == "vacio" && $request -> $select2 != "vacio"){
                    return back()->withInput()->with('mensajeDatosNoCompletos','Los datos de la falta no estan completas');
                }else if($request -> $select != "vacio" && $request -> $select2 == "vacio"){
                    return back()->withInput()->with('mensajeDatosNoCompletos','Los datos de la falta no estan completas');
                }
            }
        }else{
            return back()->withInput()->with('mensajeDatosNoCompletos','Los datos de la falta no estan completas');
        }

        if($selectFalta != "" && $selectTiroLibre != ""){
            $faltaJugador = new Falta;
            $faltaJugador -> IdJugador = $id;
            $faltaJugador -> IdPlanillaJugador = $idPlanillaJugador;
            $faltaJugador -> TipoFalta = $selectFalta;
            $faltaJugador -> CantidadTiroLibre = $selectTiroLibre;
            $faltaJugador -> save();
        }else{
            return back()->withInput()->with('mensajeNingunDato','No se agrego ningun dato');
        }

        

        return redirect('planilla/jugador/'.$idPartido)->with('mensaje','Informacion guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanillaJugador  $planillaJugador
     * @return \Illuminate\Http\Response
     */
    public function show(PlanillaJugador $planillaJugador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanillaJugador  $planillaJugador
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanillaJugador $planillaJugador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanillaJugador  $planillaJugador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanillaJugador $planillaJugador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanillaJugador  $planillaJugador
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanillaJugador $planillaJugador)
    {
        //
    }
}
