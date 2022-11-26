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
        $falta = "";
        $tiroLibre = "";

        $selectFalta = $id.'selectFalta1';
        $selectTiroLibre = $id.'selectTiroLibre1';

        if($request -> $selectFalta == "vacio"){
            if($request -> $selectTiroLibre == "vacio"){
                for($j=2; $j<=5; $j++){
                    $select = $id.'selectFalta'.$j;
                    $select2 = $id.'selectTiroLibre'.$j;
                    if($request -> $select != "vacio" || $request -> $select2 != "vacio"){
                        return back()->withInput()->with('mensajeErrorOrdenIngreso','Las faltas no fueron ingresadas en orden');
                    }
                }
                return back()->withInput()->with('mensajeNingunDato','No se agrego ningun dato');  
            }else{
                return back()->withInput()->with('mensajeDatosNoCompletos','Los datos de la falta no estan completas');
            }
            
        }else if($request -> $selectTiroLibre != "vacio"){
            for($i=2; $i<=5; $i++){
                $select = $id.'selectFalta'.$i;
                $select2 = $id.'selectTiroLibre'.$i;
                if($request -> $select == "vacio" && $request -> $select2 == "vacio"){
                    $selectActual = $id.'selectFalta'.($i-1);
                    $falta = $request -> $selectActual;

                    $selectActual2 = $id.'selectTiroLibre'.($i-1);
                    $tiroLibre = $request -> $selectActual2;
                    
                    for($j=$i+1; $j<=5; $j++){
                        $select = $id.'selectFalta'.$j; 
                        $select2 = $id.'selectTiroLibre'.$j;
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

        if($falta != "" && $tiroLibre != ""){
            $faltaJugador = new Falta;
            $faltaJugador -> IdJugador = $id;
            $faltaJugador -> IdPlanillaJugador = $idPlanillaJugador;
            $faltaJugador -> TipoFalta = $falta;
            $faltaJugador -> CantidadTiroLibre = $tiroLibre;
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
