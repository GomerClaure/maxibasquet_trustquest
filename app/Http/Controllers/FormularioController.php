<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Aplicacion;
use App\Models\Aplicaciones;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $aplicaciones = Aplicacion::select(
            'aplicaciones.IdAplicacion',
            'aplicaciones.NombreEquipo',
            'preinscripciones.Monto',
            'aplicaciones.EstadoAplicacion',
            'aplicaciones.Categorias',
            'aplicaciones.observaciones'
        )
            ->join('preinscripciones', 'aplicaciones.IdPreinscripcion', '=', 'preinscripciones.IdPreinscripcion')
            ->get();
        // $aplicaciones = Aplicaciones::all();
        $aplicaciones = $this->ingresarMonto($aplicaciones);
        return view("formulario.listaFormulario", compact('aplicaciones'));
    }

    private function ingresarMonto($aplicaciones)
    {
        $arreglo = array();
        if (!$aplicaciones->isEmpty()) {
            foreach ($aplicaciones as $aplicacion) {
                $categorias = explode(",", $aplicacion->Categorias);
                $total = sizeof($categorias) * $aplicacion->Monto;
                $aplicacion->Total = $total;
                array_push($arreglo, $aplicacion);
            }
        }
        return $arreglo;
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
        return ('hola store');
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
            'aplicaciones.IdAplicacion',
            'aplicaciones.CorreoElectronico',
            'aplicaciones.NumeroTelefono',
            'aplicaciones.NombreEquipo',
            'aplicaciones.Categorias',
            'transacciones.NumeroTransaccion',
            'transacciones.NumeroCuenta',
            'transacciones.MontoTransaccion',
            'transacciones.FechaTransaccion',
            'transacciones.FotoVaucher',
            'paises.NombrePais',
            'aplicaciones.EstadoAplicacion',
            'aplicaciones.observaciones'
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
        return ('hola edit');
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
        $datos = request()->except(['_token', '_method']);
        $observacion=$datos['observaciones'];
        $valido = $datos['estadoAplicacion'];
        $datosApp = Aplicaciones::find($id);
        $datosApp->EstadoAplicacion = $valido;
        $datosApp->observaciones = $observacion;
        echo ($observacion);
        $datosApp->save();

        $aplicaciones = Aplicacion::select(
            'aplicaciones.IdAplicacion',
            'aplicaciones.NombreEquipo',
            'preinscripciones.Monto',
            'aplicaciones.EstadoAplicacion',
            'aplicaciones.Categorias',
            'aplicaciones.observaciones'
        )
            ->join('preinscripciones', 'aplicaciones.IdPreinscripcion', '=', 'preinscripciones.IdPreinscripcion')
            
            ->get();

        $aplicaciones = $this->ingresarMonto($aplicaciones);
        return view("formulario.listaFormulario", compact('aplicaciones'));
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
        return ('hola de sde delete');
    }
}
