<?php

namespace App\Http\Controllers;
use App\Models\Juez;
use App\Models\Partido;
use Illuminate\Support\Facades\DB;
use App\Models\JuecesPorPartido;
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

    public function mostrarRegistroJugadas(){
        return view('registroJugadas.registroJugadas');
    }
    public function guardarRegistroJueces(Request $request){
        $formulario = request()->except('_token');
        // DB::table("jueces_por_partidos")->insert([
        //     'IdJuez' => $formulario['anotadorPrincipal'],
        //     'IdPartido'=>$formulario['id'],
        //     'TipoJuez'=>'primerJuez',
        //     'created_at'=>now(),
        //     'updated_at'=>now()
        // ]);
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
        // $juecesPorPartido = new JuecesPorPartido();
        // $juecesPorPartido->IdPartido = $formulario['id'];
        // $juecesPorPartido->IdJuez = $formulario['anotadorPrincipal'];
        // $juecesPorPartido->TipoJuez = 'primerJuez';
        // $juecesPorPartido->save();
        // $juecesPorPartido->IdJuez = $formulario['anotadorAsistente'];
        // $juecesPorPartido->TipoJuez = 'segundoJuez';
        // $juecesPorPartido->save();
        // $juecesPorPartido->IdJuez = $formulario['cronometrista'];
        // $juecesPorPartido->TipoJuez = 'cronometrista';
        // $juecesPorPartido->save();
        // $juecesPorPartido->IdJuez = $formulario['apuntador'];
        // $juecesPorPartido->TipoJuez = 'cronometrista';
        // $juecesPorPartido->save();
        // return $request;
        return redirect('registroJugadas/'.$request->id);
    }
    public function mostrarRegistroJueces($id)
    {
        // $juecesPorPartido = DB::table('jueces_por_partidos')
        //     ->where('Id', '1')
        //     ->get();
        $juecesPorPartido = JuecesPorPartido::where('IdPartido','=',$id)->get();
        // echo ($juecesPorPartido->isEmpty()) ? 'true' : 'false';
        // return $juecesPorPartido;
        if($juecesPorPartido->isEmpty()){
            $jueces = $this->getJuecesValidos($id); 
            return view('registroJugadas.registroJueces',compact('jueces','id'));
        }else{
            return redirect('registrarJugadas/'.$id);
        }
    }
    private function getJuecesValidos($id){
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
