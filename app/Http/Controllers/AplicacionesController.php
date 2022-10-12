<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Aplicacion;
use App\Models\Pais;
use App\Models\Preinscripcion;
use App\Models\Transaccion;
use Illuminate\Validation\Rule;
use App\Rules\AlphaSpaces;
use App\Rules\AlphaNumeric;
use DateTime;


class AplicacionesController extends Controller
{

    public function index()
        {
            $paises = Pais::all();
            // $preinscripcion = Aplicacion::find(2);
            // echo $preinscripcion;
            return view('preinscripcion.preinscripcionEquipo', compact('paises'));
        }
        //  para guardar una preinscripcion
        public function store(Request $request)
        {
            $dateToday = date('m/d/Y');
            $dateAfter = new DateTime('2022-07-01');
            $request -> validate([
                config('constants.VAUCHER_PAGO')=>'required|image|max:10000',
                config('constants.NOMBRE_EQUIPO')=>['required','max:30',new AlphaNumeric],
                config('constants.NOMBRE_ENCARGADO') => ['required','max:50',new AlphaSpaces],
                config('constants.CATEGORIAS') =>  'required',
                config('constants.CORREO_ELECTRONICO') => 'required|email|max:255',
                config('constants.TELEFONO_CONTACTO') => 'required|max:15',
                config('constants.DATOS_PAGO') => ['required','max:50', new AlphaNumeric],
                config('constants.MONTO_PAGAR') => 'required|max:6',
                config('constants.NUM_CUENTA') => 'required|max:255',
                config('constants.FEC_DEPOSITO') => ['required','date','before:'.$dateToday,'after:'.date_format($dateAfter, "d/m/Y")],
            ]);   
            $formulario=request()->except('_token');
            $aplicacionPreinscripcion = new Aplicacion;
            $formulario[config('constants.VAUCHER_PAGO')] = $request->file(config('constants.VAUCHER_PAGO'))->store('upload');
            $aplicacionPreinscripcion->IdPreinscripcion = 1;
            // echo $formulario['pais'];
            
            // echo $pais;
            try {
                $pais= Pais::where('NombrePais', '=', $formulario[config('constants.PAIS')])->firstOrFail();
                $aplicacionPreinscripcion->IdPais = $pais->IdPais;
            } catch (\Throwable $th) {
                echo 'Paso un error al capturar el país: ',  $th->getMessage(), "\n";
                return back()->withError('El CodigoPais ' . $formulario[config('constants.PAIS')]." no es válido")->withInput();;
            }
            
            $aplicacionPreinscripcion->NombreUsuario = $formulario[config('constants.NOMBRE_ENCARGADO')];
            $aplicacionPreinscripcion->CorreoElectronico = $formulario[config('constants.CORREO_ELECTRONICO')];
            $aplicacionPreinscripcion->NumeroTelefono = $formulario[config('constants.TELEFONO_CONTACTO')];
            $aplicacionPreinscripcion->EstadoAplicacion= 'Pendiente';
            $aplicacionPreinscripcion->NombreEquipo = $formulario[config('constants.NOMBRE_EQUIPO')];
            $opcionesCategorias = $formulario[config('constants.CATEGORIAS')];
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
            $transaccion->NumeroTransaccion = $formulario[config('constants.DATOS_PAGO')];
            $transaccion->MontoTransaccion = $formulario[config('constants.MONTO_PAGAR')];
            $transaccion->NumeroCuenta = $formulario[config('constants.NUM_CUENTA')];
            $transaccion->FechaTransaccion = $formulario[config('constants.FEC_DEPOSITO')];
            $transaccion->FotoVaucher = $formulario[config('constants.VAUCHER_PAGO')];
            $transaccion->save();
            $paises = Pais::all();
            // return $request;
            return view('preinscripcion.preinscripcionEquipo',compact('paises'));
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
