<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\Aplicacion;
use App\Models\Aplicaciones;
use App\Models\Categoria;
use App\Models\Categorias_por_equipo;
use App\Models\CategoriaEquipo;
use App\Models\Categorias;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
            ->orderby('NombreEquipo')
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
        $categoriasGuardadas = Categorias::select("IdCategoria","NombreCategoria")->get();
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
            $categorias = $this->separar($request->categorias);
            $guardar = $this->comprobarGuardar($request->nombreEquipos);
            if($guardar != 0){
                $this->guardarCategorias($guardar,$categorias);
            }
            else{
                /**crear Usuario */
            $usuario = new User;
            $usuario -> IdRol =  4;
            $usuario -> name = $request -> NombreEncargado;
            $usuario -> email = $request -> correoElectronico;
            
            $consultaCorreo = DB::table('users')
                        ->select('email')
                        ->where('email', $request -> correoElectronico, 1)
                        ->get();
            
            if(!$consultaCorreo ->isEmpty()){
             return back()->with('mensajeErrorEmail','El correo ya esta registrado');
                }
            
            $contrasenia = Str::random(8);
            $hashed = Hash::make($contrasenia);
            $usuario -> password = $hashed;
            $usuario -> save();
            
            /**Guardar delegado */
            $delegado = new Delegado;
            $delegado -> IdUsuario = $usuario -> id;
            $delegado -> FechaRegistroDelegado = now();
            $delegado -> TelefonoDelegado = $request -> telefono;
            $delegado ->save();
            
            /**Guardar Equipo */
            $equipo = new Equipo;
            $equipo->NombreEquipo = $request->nombreEquipos;
            $equipo->IdDelegado = $delegado -> IdDelegado;
            $equipo->IdAplicacion = $id;
            $equipo->LogoEquipo = 'uploads\logo.jpg';
           
            $equipo->save();
            $this->guardarCategorias($equipo -> IdEquipo,$categorias);

            }
        }
        $datosApp = Aplicaciones::find($id);
        $datosApp->EstadoAplicacion = $valido;
        $datosApp->observaciones = $observacion;
        $datosApp->save();

        return redirect('/formulario');
    }
    public function guardarCategorias($id,$categorias){
        $categoriasGuardadas = Categorias::select("IdCategoria","NombreCategoria")->get();
        if (!$categoriasGuardadas -> isEmpty()) {
                
            foreach ($categoriasGuardadas as $categoria) {
                for ($i=0; $i < sizeof($categorias); $i++) { 
                    if ($categorias[$i] == $categoria->NombreCategoria) {
                        $categoriasEquipo = new Categorias_por_equipo();
                        $categoriasEquipo->IdEquipo = $id;
                        $categoriasEquipo->IdCategoria = $categoria->IdCategoria;
                        $categoriasEquipo->IdCampeonato = 1;
                        $categoriasEquipo;
                        $categoriasEquipo->save();
                    }
                }
        
            }
        }

    }
    /**verifica la existencia de un equipo en la bd, devuelve 0 si no exite equipo sino el id del equipo
     * 
     */
    public function comprobarGuardar($nombreEquipo){
        $catego = Categorias_por_equipo::select("NombreCategoria" , "equipos.IdEquipo")
                                            ->join("categorias","categorias_por_equipo.IdCategoria","=","categorias.IdCategoria")
                                            ->join("equipos","equipos.IdEquipo","=","categorias_por_equipo.IdEquipo")
                                            ->where("equipos.NombreEquipo",$nombreEquipo)
                                            ->whereNull("equipos.deleted_at")
                                            ->get();
        if (!$catego ->isEmpty() ) {
            return $catego[0]->IdEquipo;
        }
        else{
            return 0;
        }
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
