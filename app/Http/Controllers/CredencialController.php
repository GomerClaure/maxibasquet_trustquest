<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Tecnico;
use Illuminate\Http\Request;
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
        //
    }
    /**
     * obtiene los datos de los integrantes de los equipos y se le asigana un credencuial
     */
    public function credencialesDeEquipo($equipo,$categoria){
        $jugadores = Jugador::select()
                            ->join('personas','personas.IdPersona','jugadores.IdPersona')
                            ->where('IdEquipo','=',$equipo)
                            ->where('IdCategoria','=',$categoria)
                            ->get();
        $tecnicos = Tecnico::select()
                            ->join('personas','personas.IdPersona','tecnicos.IdPersona')
                            ->where('IdEquipo','=',$equipo)
                            ->where('IdCategoria','=',$categoria)
                            ->get();
        return [$jugadores,$tecnicos];
    }
    /**
     * Crea y guarda las imagenes de los codigos qr de las credenciales 
     */
    public function qr(){
        $id =3;
        QrCode::format('png')->size(250)->generate('http://127.0.0.1:8000/jugador/'.$id, '../storage/app/public/qrcodes/qrcode.png');
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
