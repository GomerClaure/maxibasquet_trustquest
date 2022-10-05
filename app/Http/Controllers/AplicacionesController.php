<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Aplicacion;
use App\Models\Pais;
use App\Models\Preinscripcion;
use App\Models\Transaccion;
use Illuminate\Validation\Rule;
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
            $dateToday = date('m/d/Y');
            // $dateToday = date(strtotime ('-1 day',strtotime($dateToday)));
            echo $dateToday;
            $request -> validate([
                'vaucher'=>'required|image',
                'nombreDeEquipo'=>'required|max:30|alpha',
                'nombreDelEncargado' => 'required|max:50|alpha',
                'option' =>  'required',
                'correo' => 'required|email|max:255',
                'telefono' => 'required|max:15',
                'numComprobante' => 'required|max:255',
                'montoPagar' => 'required|max:5',
                'numCuenta' => 'required|max:255',
                'fecDeposito' => 'required|date|before:'.$dateToday,
            ],$message =['required'=>'el campo :attribute es requerido', 'numeric'=> 'el campo :attribute no es numerico(Este campo necesita ser un numero)']);   
            $formulario=request()->except('_token');
            $aplicacionPreinscripcion = new Aplicacion;
            $formulario['vaucher'] = $request->file('vaucher')->store('upload');
            $aplicacionPreinscripcion->IdPreinscripcion = 1;
            $pais= Pais::where('NombrePais', '=', $formulario['pais'])->firstOrFail();
            // echo $pais;
            $aplicacionPreinscripcion->IdPais = $pais->IdPais;
            $aplicacionPreinscripcion->NombreUsuario = $formulario['nombreDelEncargado'];
            $aplicacionPreinscripcion->CorreoElectronico = $formulario['correo'];
            $aplicacionPreinscripcion->NumeroTelefono = $formulario['telefono'];
            $aplicacionPreinscripcion->EstadoAplicacion= 'Pendiente';
            $aplicacionPreinscripcion->NombreEquipo = $formulario['nombreDeEquipo'];
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
            $aplicacionPreinscripcion->save();
            // $aplicacionPreinscripcion->IdAplicacion;
   
            $transaccion = new Transaccion;
            $transaccion->IdAplicacion = $aplicacionPreinscripcion->IdAplicacion;
            $transaccion->NumeroTransaccion = $formulario['numComprobante'];
            $transaccion->MontoTransaccion = $formulario['montoPagar'];
            $transaccion->NumeroCuenta = $formulario['numCuenta'];
            $transaccion->FechaTransaccion = $formulario['fecDeposito'];
            $transaccion->FotoVaucher = $formulario['vaucher'];
            $transaccion->save();
            return view('preinscripcion');
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
