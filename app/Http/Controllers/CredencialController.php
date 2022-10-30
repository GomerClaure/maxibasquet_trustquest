<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Credencial;
use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Tecnico;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CredencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


    public function credencialesPdf($equipo,$categoria){
        $credencialesJugadores = Credencial::select('credenciales.CodigoQR','personas.CiPersona','personas.NombrePersona',
        'personas.ApellidoPaterno','personas.Foto')
        ->join('personas','personas.IdPersona','credenciales.IdPersona')
        ->join('jugadores','personas.IdPersona','jugadores.IdPersona')
        ->where('jugadores.IdEquipo','=',$equipo)
        ->where('jugadores.IdCategoria','=',$categoria)
        ->get();

    $credencialesTecnicos = Credencial::select('credenciales.CodigoQR','personas.CiPersona','personas.NombrePersona',
            'personas.ApellidoPaterno','personas.Foto','tecnicos.RolesTecnicos')
            ->join('personas','personas.IdPersona','credenciales.IdPersona')
            ->join('tecnicos','personas.IdPersona','tecnicos.IdPersona')
            ->where('tecnicos.IdEquipo','=',$equipo)
            ->where('tecnicos.IdCategoria','=',$categoria)
            ->get();

    $equipos = Equipo::select()
            ->join('categorias_por_equipo','categorias_por_equipo.IdEquipo','equipos.IdEquipo')
            ->join('categorias','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
            ->where('equipos.IdEquipo','=',$equipo)
            ->where('categorias.IdCategoria','=',$categoria)
            ->get();
    $equipo = $equipos[0];
    $pdf = Pdf::loadView('credencial.pdf',['credencialesJugadores'=>$credencialesJugadores,
           'credencialesTecnicos'=>$credencialesTecnicos,'equipo'=>$equipo]);
    
    return $pdf->stream();
    }
    /**
     * obtiene los datos de los credenciales de los jugadores y cuerpo tecnico
     * por categoria de un equipo
     */
    public function credencialesDeEquipo($equipo,$categoria){
        $credencialesJugadores = Credencial::select('credenciales.CodigoQR','personas.CiPersona','personas.NombrePersona',
                            'personas.ApellidoPaterno','personas.Foto')
                            ->join('personas','personas.IdPersona','credenciales.IdPersona')
                            ->join('jugadores','personas.IdPersona','jugadores.IdPersona')
                            ->where('jugadores.IdEquipo','=',$equipo)
                            ->where('jugadores.IdCategoria','=',$categoria)
                            ->get();

        $credencialesTecnicos = Credencial::select('credenciales.CodigoQR','personas.CiPersona','personas.NombrePersona',
                            'personas.ApellidoPaterno','personas.Foto','tecnicos.RolesTecnicos')
                            ->join('personas','personas.IdPersona','credenciales.IdPersona')
                            ->join('tecnicos','personas.IdPersona','tecnicos.IdPersona')
                            ->where('tecnicos.IdEquipo','=',$equipo)
                            ->where('tecnicos.IdCategoria','=',$categoria)
                            ->get();
        
        $equipos = Equipo::select()
                            ->join('categorias_por_equipo','categorias_por_equipo.IdEquipo','equipos.IdEquipo')
                            ->join('categorias','categorias_por_equipo.IdCategoria','=','categorias.IdCategoria')
                            ->where('equipos.IdEquipo','=',$equipo)
                            ->where('categorias.IdCategoria','=',$categoria)
                            ->get();
        
        if(! $equipos->isEmpty()){
            $equipo = $equipos[0];
    
        }else{
            $equipo = null;
            $categoria = null;
        }
        return view('credencial.credenciales',compact('credencialesJugadores',
                    'credencialesTecnicos','equipo'));
    }
    public function generarCredenciales($equipo,$categoria){
        $jugadores = Jugador::select("personas.CiPersona","personas.IdPersona")
        ->join('personas','personas.IdPersona','jugadores.IdPersona')
        ->where('IdEquipo','=',$equipo)
        ->where('IdCategoria','=',$categoria)
        ->get();
       $this->generarQr($jugadores);
        $tecnicos = Tecnico::select("personas.CiPersona","personas.IdPersona")
        ->join('personas','personas.IdPersona','tecnicos.IdPersona')
        ->where('IdEquipo','=',$equipo)
        ->where('IdCategoria','=',$categoria)
        ->get();
        $this->generarQr($tecnicos);
        return redirect('credenciales/'.$equipo.'/'.$categoria);

    }
    public function generarQr($personas){
        foreach ($personas as $persona) {
            $this->qr($persona->IdPersona,$persona->CiPersona);
        }
    }
    /**
     * Crea y guarda las imagenes de los codigos qr de las credenciales 
     */
    public function qr($id,$ci){
        QrCode::format('png')->size(250)
                ->generate('http://127.0.0.1:8000/jugador/'.$id,
                '../storage/app/public/qrcodes/'.$id.$ci.'.png');
       $credencial = Credencial::where('IdPersona',$id)->get();
       if($credencial -> isEmpty()){
        $credencial = new Credencial;
        $credencial->IdPersona = $id;
        $credencial -> CodigoQR = 'qrcodes/'.$id.$ci.'.png';
        $credencial->created_at = now();
        $credencial->updated_at = now();
        $credencial->save();
       }else{
        $credencial = Credencial::where('IdPersona',$id)->update(['CodigoQR'=>'qrcodes/'.$id.$ci.'.png','updated_at'=>now()]);
       }
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
        //
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
        //
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
