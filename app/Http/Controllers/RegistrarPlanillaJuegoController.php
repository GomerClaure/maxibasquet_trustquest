<?php

namespace App\Http\Controllers;
use App\Models\Juez;
use App\Models\Partido;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    public function registro($id)
    {
        $jueces = $this->getJuecesValidos($id);
        // return $jueces;
        return view('registroJugadas.registroJueces',compact('jueces'));
    }
    public function getJuecesValidos($id){
        date_default_timezone_set('America/La_Paz');
        $partido = Partido::find($id);
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
        // return $partidosProgramados;
        return $juecesValidos;
    }
}
