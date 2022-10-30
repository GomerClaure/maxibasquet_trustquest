<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Aplicacion;
use App\Models\Aplicaciones;
use App\Models\Categoria;
use App\Models\Categoria_por_equipo;
use App\Models\CategoriaEquipo;
use App\Models\Equipo;
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

        return view("formulario.listaFormulario", compact('aplicaciones'));
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

    private function separar($categorias)
    {
        return explode(",", $categorias);
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

        /*  if (! $aplicaciones->isEmpty()) {
            $datos = $aplicaciones[0];
            $categorias = $this->separar($datos->Categorias);
            $datos->Categorias=$categorias;
        }else{
            $aplicacion = null;
        }*/

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
        $categorriasPorEquipo = ['+30', '+35', '40', '+45', '+50', '55', '60'];
        $request->validate(
            [
                'observaciones' => 'required|regex:/^([a-z][a-z, ]+)+$/'
            ],
            [
                'observaciones.required' => 'por favor llene este campo',
                'observaciones.regex' => 'solo se admiten letras'
            ]
        );



        $datos = request()->except(['_token', '_method']);
        $observacion = $datos['observaciones'];
        $valido = $datos['estadoAplicacion'];
        if ($valido == 'Aceptado') {
            $equipo = new Equipo;
            $equipo->NombreEquipo = $request->nombreEquipos;
            $equipo->IdAplicacion = $id;
            $equipo->LogoEquipo = 'uploads\logo.jpg';
            $equipo->save();
            $idEquipo = $equipo->idEquipo;
            echo $equipo->idEquipo;
            $categorias = $this->separar($request->categorias);

            for ($i = 0; $i < sizeof($categorias); $i++) {
                if ($categorias[$i] == $categorriasPorEquipo[$i]) {
                    $categoriasEquipo = new Categoria_por_equipo();
                    $categoriasEquipo->IdEquipo = $idEquipo;
                    $categoriasEquipo->IdCategoria = $i;
                    $categoriasEquipo->IdCampeonato = 1;
                }
            }
        }
        $datosApp = Aplicaciones::find($id);
        $datosApp->EstadoAplicacion = $valido;
        $datosApp->observaciones = $observacion;
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
        // $aplicaciones = Aplicaciones::all();

        //return view("formulario.listaFormulario", compact('aplicaciones'));

        return redirect('/formulario');
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
