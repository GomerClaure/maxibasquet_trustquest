<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Juez;
use App\Models\Partido;
use Illuminate\Support\Facades\DB;
use App\Models\JuecesPorPartido;
use App\Models\Datos_partidos;
use App\Models\Equipo;
use App\Models\Jugada;
use App\Models\Jugador;
use App\Models\Planilla;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class RegistrarPlanillaJuegoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private  $fechaPartidoActual;
    private  $horaPartidoActual ;
    public function index(Request $request)
    {
        return view('registroJugadas.navegacionRegistro');
    }
    // Mostrar resumen del partido------------------------------------------------------------------------------
    public function mostrarResumen($idPartido){
        $IdJuecesPorPartido = JuecesPorPartido::select('jueces_por_partidos.IdJuez')
                            ->where('IdPartido',$idPartido)
                            ->get();
        $jueces = Juez::select('personas.NombrePersona','personas.ApellidoPaterno')
                ->join('personas','jueces.IdPersona','=','personas.IdPersona')
                // ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[0]->IdJuez)
                // ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[1]->IdJuez)
                ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[2]->IdJuez)
                ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[3]->IdJuez)
                ->get();
        $partido = Partido::find($idPartido);
        $idEquipos = Datos_partidos::select('datos_partidos.IdEquipo')
                        ->where('datos_partidos.IdPartido','=',$idPartido)
                        ->get();
        $equipoA = Equipo::find($idEquipos[0]->IdEquipo);
        $equipoB = Equipo::find($idEquipos[1]->IdEquipo);
        $jugadasCuartos = $this->getCuartosAnotados($idPartido);
        $jugadasEquipoA = $jugadasCuartos[0];
        $equipoA -> Equipo = "A";
        $equipoB -> Equipo = "B";
        $jugadasEquipoB = $jugadasCuartos[1];
        $totalA = array_sum($jugadasEquipoA);
        $totalB = array_sum($jugadasEquipoB);
        $registroTabla1 = range(1,40);
        $registroTabla2 = range(41,80);
        $registroTabla3 = range(81,120);
        $registroTabla4 = range(121,160);
        $ganador = $totalA>$totalB?$equipoA:$equipoB;
        $jugadas = $this->getJugadas($idPartido);
        return view('registroJugadas.resumenJugadas',
        compact('jugadas','registroTabla1','jueces','jugadasEquipoA','jugadasEquipoB','totalA','totalB','ganador',
        'registroTabla2','registroTabla3','registroTabla4'));
        // return $ganador;
    }

    public function getCuartosAnotados($idPartido)
    {
        $jugadas = Jugada::select('jugadas.CuartoJugada','jugadas.TipoJugada','jugadas.Equipo')
                            ->where('jugadas.IdPartido','=',$idPartido)
                            ->get();
        $jugadasA = [0,0,0,0];
        $jugadasB = [0,0,0,0];
        foreach ($jugadas as $key => $jugada) {
            $punto = 0;
            $cuarto = $jugada->CuartoJugada;
            $punto = $jugada->TipoJugada;
            if ($jugada->Equipo == "A") {
                $jugadasA[$cuarto-1] = $punto + $jugadasA[$cuarto-1];
            }else{
                $jugadasB[$cuarto-1] = $punto + $jugadasB[$cuarto-1];
            }
        }
        return [$jugadasA,$jugadasB];
    }

    // Guardado de datos de juego------------------------------------------------------------------------------
    public function guardarDatosJuego(Request $request){
        
        date_default_timezone_set('America/La_Paz');
        $formulario = request()->except('_token');
        $idPartido = $formulario['idPartido'];
        $partido = Partido::find($idPartido);
        if ($partido->EstadoPartido == "finalizado") {
            return redirect('mostrarResumen/'.$idPartido);
        }else{
            try {
                $accion = $formulario["accionBoton"];
            } catch (\Throwable $th) {
                $accion = 'GuardarPunto';
            }
            
            $cuarto = $this->getCuartoJugado($idPartido);
            if ($accion == 'IniciarPartido') {
                $planilla = new Planilla();
                $planilla->IdPartido = $idPartido;
                $planilla->PrimerCuartoJugado = true;
                $planilla->InicioLlenado = now();
                $planilla->save();
                Partido::where('partidos.IdPartido','=',$idPartido)
                    ->update(['EstadoPartido' => 'curso']);
            }
            if($accion == 'GuardarPunto'){
                $puntoEquipo = explode(' ', $formulario['GuardarPunto']);
                $nomEquipo = $puntoEquipo[0];
                $idEquipo = $puntoEquipo[1];
                $idJugador = $puntoEquipo[2];
                $puntuacion = $puntoEquipo[3];
                if ($nomEquipo == 'A') {
                    $charEquipo = 'A';
                }elseif ($nomEquipo == 'B') {
                    $charEquipo = 'B';
                }
                $jugada = new Jugada;
                $jugada -> IdJugador = $idJugador;
                $jugada -> IdPartido = $idPartido;
                $jugada -> Equipo = $charEquipo;
                $jugada -> TipoJugada = $puntuacion;
                $jugada -> CuartoJugada = $cuarto;
                $jugada -> HoraJugada = date('H:i:s');
                $jugada -> save();
            }elseif($accion == 'FinalizarCuarto'){
                if($cuarto <4){
                    switch ($cuarto) {
                        case 0:
                            return back()->withInput()->with(['cuarto' => $cuarto]);
                            break;
                        case 1:
                            $campoActualizar = "SegundoCuartoJugado";
                            break;
                        case 2:
                            $campoActualizar = "TercerCuartoJugado";
                            break;
                        case 3:
                            $campoActualizar = "CuartoCuartoJugado";
                            break;
                    }
                    $planilla = Planilla::where('planillas.IdPartido','=',$idPartido)
                            ->update([$campoActualizar => true]);
                }else{
                    Partido::where('partidos.IdPartido','=',$idPartido)
                    ->update(['EstadoPartido' => 'finalizado']);
                    return redirect('mostrarResumen/'.$idPartido);
                }
            }
            $jugadas = $this->getJugadas($idPartido);
            return back()->withInput()->with(compact('cuarto','jugadas'));
        }
        // return $request;
        // return $jugadas;
    }

    public function mostrarDatosPartido($idPartido){
        $cuarto = $this->getCuartoJugado($idPartido); 
        date_default_timezone_set('America/La_Paz');
        $partido = Partido::find($idPartido);
        if ($partido->EstadoPartido == "finalizado") {
            return redirect('mostrarResumen/'.$idPartido);
        }else{
            $idEquipos = Datos_partidos::select('datos_partidos.IdEquipo')
                        ->where('datos_partidos.IdPartido','=',$idPartido)
                        ->get();
            $equipoA = Equipo::find($idEquipos[0]->IdEquipo);
            $equipoB = Equipo::find($idEquipos[1]->IdEquipo);
            $partido = Partido::find($idPartido);
            $categoria = Categoria::find($partido->IdCategoria);
            $fechaHoy = date('d-m-Y');
            $IdJuecesPorPartido = JuecesPorPartido::select('jueces_por_partidos.IdJuez')
                                ->where('IdPartido',$idPartido)
                                ->get();
            $jueces = Juez::select('personas.NombrePersona','personas.ApellidoPaterno')
                    ->join('personas','jueces.IdPersona','=','personas.IdPersona')
                    ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[0]->IdJuez)
                    ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[1]->IdJuez)
                    // ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[2]->IdJuez)
                    // ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[3]->IdJuez)
                    ->get();
            $jugadoresA = Jugador::select('jugadores.IdJugador','personas.NombrePersona',
                        'personas.ApellidoPaterno')
                        ->join('personas','jugadores.IdPersona','=','personas.IdPersona')
                        ->where('jugadores.IdEquipo','=',$equipoA->IdEquipo)
                        ->where('jugadores.IdCategoria','=',$partido->IdCategoria)
                        ->get();
            $jugadoresB = Jugador::select('jugadores.IdJugador','personas.NombrePersona',
                        'personas.ApellidoPaterno')
                        ->join('personas','jugadores.IdPersona','=','personas.IdPersona')
                        ->where('jugadores.IdEquipo','=',$equipoB->IdEquipo)
                        ->where('jugadores.IdCategoria','=',$partido->IdCategoria)
                        ->get();
            $registroTabla1 = range(1,40);
            $registroTabla2 = range(41,80);
            $registroTabla3 = range(81,120);
            $registroTabla4 = range(121,160);
            $jugadas = $this->getJugadas($idPartido);
            return view('registroJugadas.registroJugadas',
            compact('idEquipos','equipoA','cuarto',
            'equipoB','categoria','fechaHoy','idPartido',
            'partido','jueces','jugadoresA','jugadoresB','jugadas',
            'registroTabla1','registroTabla2','registroTabla3','registroTabla4'));
        }
        
        // return json_encode($jugadas);
        // return $cuarto;
    }

    public function getJugadas($idPartido){
        $jugadas = Jugada::select('jugadores.NumeroCamiseta','jugadas.CuartoJugada',
                                        'jugadas.TipoJugada','jugadas.HoraJugada','jugadas.Equipo')
                            ->join('jugadores','jugadas.IdJugador','=','jugadores.IdJugador')
                            ->where('jugadas.IdPartido','=',$idPartido)
                            ->get();
        $jugadas = $this->ordenarQuickSort($jugadas);
        // $jugadasMayorAMenor = array_reverse($jugadas);
        return json_encode($jugadas);
    }
    function ordenarQuickSort($arreglo){
        $arrIzq = [];
        $arrDer = [];
        $result = [];
        if (count($arreglo) ==0) {
            return [];
        }else{
            $primerElemento = $arreglo[0];
            $horaElemento = $primerElemento->HoraJugada; 
            // echo $horaElemento;
            // echo "  ";
            for ($i=1; $i < count($arreglo); $i++) { 
                $elemento = $arreglo[$i];
                $horaAct = $elemento->HoraJugada;
                if ($horaAct<$horaElemento) {
                    array_push($arrIzq,$elemento);
                    // echo $horaAct." Es menor que ".$horaElemento;
                }else{
                    array_push($arrDer,$elemento);
                    // echo $horaAct." Es mayor que ".$horaElemento;
                }
                // echo "  ";
            }
            $result = array_merge($this->ordenarQuickSort($arrIzq), [$primerElemento]);
            $result = array_merge($result, $this->ordenarQuickSort($arrDer));
        }
        return $result;
	}

    public function getCuartoJugado($idPartido)
    {
        $cuartos = Planilla::select('planillas.PrimerCuartoJugado','planillas.SegundoCuartoJugado',
                                        'planillas.TercerCuartoJugado','planillas.CuartoCuartoJugado')
                            ->where('planillas.IdPartido','=',$idPartido)
                            ->get();
        if ($cuartos->isEmpty()) {
            $numCuarto = 0;
        }else{
            $numCuarto = 0;
            if($cuartos[0]->PrimerCuartoJugado){$numCuarto++;}
            if($cuartos[0]->SegundoCuartoJugado){$numCuarto++;}
            if($cuartos[0]->TercerCuartoJugado){$numCuarto++;}
            if($cuartos[0]->CuartoCuartoJugado){$numCuarto++;}
        }
        return $numCuarto;
        // return $cuartos;
    }

    // Guardado y registro de jueces------------------------------------------------------------------------------

    public function guardarRegistroJueces(Request $request){
        $formulario = request()->except('_token');
        $arrayjuecesrepetidos = array_count_values([$formulario['anotadorPrincipal'],
            $formulario['anotadorAsistente'],$formulario['cronometrista'],$formulario['apuntador']]);
        foreach ($arrayjuecesrepetidos as $key => $value) {
            if ($value >= 2) {
                return back()->withInput()->with('errorJueces',
                'No puede existir un juez con dos cargos en el partido.');
            }
        }
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => $formulario['anotadorPrincipal'],
            'IdPartido'=>$formulario['id'],
            'TipoJuez'=>'primerJuez',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => $formulario['anotadorAsistente'],
            'IdPartido'=>$formulario['id'],
            'TipoJuez'=>'segundoJuez',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => $formulario['cronometrista'],
            'IdPartido'=>$formulario['id'],
            'TipoJuez'=>'cronometrista',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table("jueces_por_partidos")->insert([
            'IdJuez' => $formulario['apuntador'],
            'IdPartido'=>$formulario['id'],
            'TipoJuez'=>'apuntador',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return redirect('registrarJugadas/'.$request->id);
    }
    public function mostrarRegistroJueces($idPartido)
    {
        $juecesPorPartido = JuecesPorPartido::where('IdPartido','=',$idPartido)->get();
        if($juecesPorPartido->isEmpty()){
            $jueces = $this->getJuecesValidos($idPartido); 
            return view('registroJugadas.registroJueces',compact('jueces','idPartido'));
        }else{
            return redirect('registrarJugadas/'.$idPartido);
        }
    }
    private function getJuecesValidos($idPartido){
        date_default_timezone_set('America/La_Paz');
        $partido = Partido::find($idPartido);
        if($partido){
            $this->fechaPartidoActual = $partido->FechaPartido;
            $this->horaPartidoActual = $partido->HoraPartido;
            $partidosProgramados = Partido::select('partidos.FechaPartido', 'partidos.HoraPartido','jueces_por_partidos.IdJuez')
                                    ->join('jueces_por_partidos','jueces_por_partidos.IdPartido','=','partidos.IdPartido')
                                    ->where(function($query) {
                                        $query->orWhere('partidos.EstadoPartido','=','espera')
                                        ->orWhere('partidos.EstadoPartido', '=', 'curso');
                                    })
                                    ->where(function($query) {
                                        $query->where('partidos.FechaPartido', '=', $this->fechaPartidoActual)
                                        ->orWhere('partidos.HoraPartido', '=', $this->horaPartidoActual);
                                    })
                                    ->get();
            
            $jueces = Juez::select('personas.NombrePersona','personas.ApellidoPaterno','jueces.IdJuez')
                                ->join('personas','personas.IdPersona','=','jueces.IdPersona')
                                ->get();
            $juecesValidos = array();
            foreach ($jueces as $key => $juez) {
                $valido = true;
                foreach ($partidosProgramados as $key => $partidoProgramado) {
                    if ($juez->IdJuez == $partidoProgramado->IdJuez) {
                        $valido = false;
                        break;
                    }
                }
                if ($valido) {
                    array_push($juecesValidos,$juez);
                }
                
            }
            return $juecesValidos;
            
        }else{
            return abort(404);
        }
        
    }
}
