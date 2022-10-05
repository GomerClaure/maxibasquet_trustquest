<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Aplicacion;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $datos['aplicaciones'] = Aplicacion::paginate(5);
        return view('listaAplicaciones', $datos);
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
        return ('hola');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formulario  $formulario
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
            ->join('paises', 'aplicaciones.IdPais', '=', 'paises.IdPais')
            ->where("aplicaciones.IdAplicacion", "=", $id)
            ->get();
        if (sizeof($aplicaciones) > 0) {
            $datos = $aplicaciones[0];
        } else {
            $datos = null;
        }
        
        return (view('formulario.show', compact('datos')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(Delegado $formulario)
    {
        return ('hola');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // $datosEmpleado = request() -> except(['_token','_method']);
      // Aplicacion::where('id', $id)->update(array('Pendiente' => 'aceptado'));
        $fila = Aplicacion::find($id);
        $fila->EstadoAplicacion = 'aceptado';
        $fila->update();
        
        return $fila;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delegado $formulario)
    {
        //
    }
}
