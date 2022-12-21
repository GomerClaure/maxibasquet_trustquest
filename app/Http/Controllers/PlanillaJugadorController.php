<?php

namespace App\Http\Controllers;

use App\Models\PlanillaJugador;
use App\Models\Persona;
use App\Models\Jugador;
use App\Models\Falta;
use App\Models\Equipo;
use App\Models\Partido;
use App\Models\Datos_partidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanillaJugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::table('partidos')
            ->select('NombreEquipo','partidos.IdPartido')
            ->join('datos_partidos', 'partidos.IdPartido', '=', 'datos_partidos.IdPartido')
            ->join('equipos', 'datos_partidos.IdEquipo', '=', 'equipos.IdEquipo')
            ->get();

        return view("planillaJugador.index", compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idPartido, $idPlanillaJugador, $id)
    {   
        for($i=1;$i<=5;$i++){
                $planillaJugador = DB::table('faltas')
                                ->select('*')
                                ->where('IdJugador',$id)
                                ->where('IdPlanillaJugador',$idPlanillaJugador)
                                ->get(); 

                if($planillaJugador->count() < $i){
                    $selectActualFalta = $id.'selectFalta'.($i);
                    $selectActualTiro = $id.'selectTiroLibre'.($i);
                    
                    if($request -> $selectActualFalta == "vacio" && $request -> $selectActualTiro == "vacio"){
                        return back()->withInput()->with('mensajeNingunDato','No se agrego ningun dato');
                    }else if($request -> $selectActualFalta != "vacio" && $request -> $selectActualTiro == "vacio" || 
                                $request -> $selectActualFalta == "vacio" && $request -> $selectActualTiro != "vacio"){
                        return back()->withInput()->with('mensajeDatosNoCompletos','Los datos de la falta no estan completas');
                    }else if($request -> $selectActualFalta != "vacio" && $request -> $selectActualTiro != "vacio"){
                        $faltaJugador = new Falta;
                        $faltaJugador -> IdJugador = $id;
                        $faltaJugador -> IdPlanillaJugador = $idPlanillaJugador;
                        $faltaJugador -> TipoFalta = $request -> $selectActualFalta;
                        $faltaJugador -> CantidadTiroLibre = $request -> $selectActualTiro;
                        $faltaJugador -> save();

                        return redirect('planilla/jugador/'.$idPartido)->with('mensaje','Informacion guardado correctamente');
                    }
                }

                if($i == 5){
                    return redirect('planilla/jugador/'.$idPartido);
                }
                
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanillaJugador  $planillaJugador
     * @return \Illuminate\Http\Response
     */
    public function show($idPartido)
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
        
        $idEquipos = DB::table('datos_partidos')
                        ->select('*')
                        ->where('IdPartido',$idPartido)
                        ->get(); 

        $partidos = DB::table('partidos')
                        ->select('*')
                        ->where('IdPartido',$idPartido)
                        ->get(); 

        $arregloEquipoA = DB::table('jugadores')
                            ->select('*')
                            ->where('IdEquipo',$idEquipos[0]-> IdEquipo)
                            ->where('IdCategoria',$partidos[0]-> IdCategoria)
                            ->whereNull('deleted_at')
                            ->get();

        $personasA = array();
        $contador = 0;
        foreach ($arregloEquipoA as $jugador){
            $personasA[$contador] = Persona::find($jugador->IdPersona);
            $contador++;
        }
        //return response()->json($personasA);
        $arregloEquipoB = DB::table('jugadores')
                            ->select('*')
                            ->where('IdEquipo',$idEquipos[1]-> IdEquipo)
                            ->where('IdCategoria',$partidos[0]-> IdCategoria)
                            ->whereNull('deleted_at')
                            ->get();

        $personasB = array();
        $contador = 0;
        foreach ($arregloEquipoB as $jugador){
            $personasB[$contador] = Persona::find($jugador->IdPersona);
            $contador++;
        }

        $equipoA = Equipo::find($idEquipos[0]-> IdEquipo);
        $equipoB = Equipo::find($idEquipos[1]-> IdEquipo);
        //return response()->json($arregloEquipoA);
        return view("planillaJugador.show",compact('arregloEquipoA','personasA','arregloEquipoB','personasB','idPartido','idPlanillaJugador','faltas','equipoA','equipoB'));
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
