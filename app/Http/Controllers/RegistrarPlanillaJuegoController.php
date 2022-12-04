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
    public function guardarDatosJuego(Request $request){
        $formulario = request()->except('_token');
        $idPartido = $formulario['idPartido'];
        $accion = $formulario["accionBoton"];
        $cuarto = $this->getCuartoJugado($idPartido);
        if ($accion == 'IniciarPartido') {
            
        }elseif($accion == 'GuardarPunto'){
            if ($cuarto == 0) {
                $planilla = new Planilla();
                $planilla->IdPartido = $idPartido;
                $planilla->PrimerCuartoJugado = true;
                $planilla->InicioLlenado = now();
                $planilla->save();
                $cuarto = 1;
            }
            $puntoEquipo = explode(' ', $formulario['puntoEquipo']);
            $nomEquipo = $puntoEquipo[0];
            $idEquipo = $puntoEquipo[1];
            $puntuacion = $formulario['puntacion'];
            if ($nomEquipo == 'A') {
                $idJugador = $formulario['jugadorA'];
            }elseif ($nomEquipo == 'B') {
                $idJugador = $formulario['jugadorB'];
            }
        
            $jugada = new Jugada;
            $jugada -> IdJugador = $idJugador;
            $jugada -> IdPartido = $idPartido;
            $jugada -> TipoJugada = $puntuacion;
            $jugada -> CuartoJugada = $cuarto;
            $jugada -> HoraJugada = date('H:i');
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
                return "Finalizo el partido señores";
            }
            
            
        }
        return back()->withInput()->with(['cuarto' => $cuarto]);
        // return $request;
    }

    public function mostrarDatosPartido($idPartido){
        $cuarto = $this->getCuartoJugado($idPartido); 
        date_default_timezone_set('America/La_Paz');
        $partido = Partido::find($idPartido);
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
                ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[2]->IdJuez)
                ->orWhere('jueces.IdJuez',$IdJuecesPorPartido[3]->IdJuez)
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
        // $sePuedeRegistrar = false;
        // return $jugadoresB;
        return view('registroJugadas.registroJugadas',
        compact('idEquipos','equipoA','cuarto',
        'equipoB','categoria','fechaHoy','idPartido',
        'partido','jueces','jugadoresA','jugadoresB'));
        return $cuarto;
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

    // Guardado y registro de jueces

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
                                        ->orWhere('partidos.EstadoPartido', '=', 'jugando');
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
