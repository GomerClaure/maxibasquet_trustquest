<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplicacion;
use App\Models\Pais;
use App\Models\Preinscripcion;
use App\Models\Transaccion;
class AplicacionesController extends Controller
{
    public function index()
        {
            echo "Holaaaaaaaaaaaaaaaaaaaa";
            $preinscripcion = Aplicacion::find(2);
            echo $preinscripcion;
            return view('preinscripcion');
        }
        //  para guardar una preinscripcion
        public function store(Request $request)
        {
            
            $formulario=request()->except('_token');
            $aplicacionPreinscripcion = new Aplicacion;
            if($request->hasFile('vaucher')){
                $formulario['vaucher']=$request->file('vaucher')->store('uploads','public');
            }
            $aplicacionPreinscripcion->IdPreinscripcion = 1;
            $pais= Pais::where('NombrePais', '=', $formulario['pais'])->firstOrFail();
            // echo $pais;
            $aplicacionPreinscripcion->IdPais = $pais->IdPais;
            $aplicacionPreinscripcion->NombreUsuario = $formulario['nombreEncargado'];
            $aplicacionPreinscripcion->CorreoElectronico = $formulario['correo'];
            $aplicacionPreinscripcion->NumeroTelefono = $formulario['telefono'];
            $aplicacionPreinscripcion->EstadoAplicacion= 'Pendiente';
            $aplicacionPreinscripcion->NombreEquipo = $formulario['nombreEquipo'];
            $opcionesCategorias = $formulario['option'];
            $categorias = "";
            for ($i=0; $i < count($opcionesCategorias); $i++) { 
                if ($i==count($opcionesCategorias)-1) {
                    $categorias = $categorias.$opcionesCategorias[$i];
                }else{
                    $categorias = $categorias.$opcionesCategorias[$i].",";
                }
            }
            $aplicacionPreinscripcion->Categorias = $categorias;
            echo $categorias;
            $aplicacionPreinscripcion->save();
            // echo $aplicacionPreinscripcion;
            // $preinscripcion = new Preinscripcion;
            // $preinscripcion->IdCampeonato = 1;
            // $preinscripcion->FechaIncioPreinscripcion='1/01/2022';
            // $preinscripcion->FechaFinPreinscripcion='5/01/2023';
            // $preinscripcion->Monto = 350;
            // echo $preinscripcion;
            // $preinscripcion->save();
            // echo $idPreins;
            return request();
            // Empleado::insert($datosEmpleado);
        // return response()->json($datosEmpleado);
        }
        // para eliminar una preinscripcion
        public function destroy()
        {

        }

        public function edit()
        {

        }
}
