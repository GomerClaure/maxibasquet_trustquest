<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplicacion;
use App\Models\Pais;
use App\Models\Transaccion;
use App\Rules\AlphaSpaces;
use App\Rules\AlphaNumeric;
use Exception;
use DateTime;


class AplicacionesController extends Controller
{
    private $equipo;
    private $correo;
    private $vaucher;
    private $telefono;
    private $numCuenta;
    private $encargado;
    private $categorias;
    private $montoPagado;
    private $fecDeposito;
    private $comprobantePago;

    function __construct()
    {
        $this->pais = config('constants.PAIS');
        $this->numCuenta = config('constants.NUM_CUENTA');
        $this->vaucher = config('constants.VAUCHER_PAGO');
        $this->equipo = config('constants.NOMBRE_EQUIPO');
        $this->categorias = config('constants.CATEGORIAS');
        $this->montoPagado = config('constants.MONTO_PAGAR');
        $this->fecDeposito = config('constants.FEC_DEPOSITO');
        $this->correo = config('constants.CORREO_ELECTRONICO');
        $this->telefono = config('constants.TELEFONO_CONTACTO');
        $this->comprobantePago = config('constants.DATOS_PAGO');
        $this->encargado = config('constants.NOMBRE_ENCARGADO');
    }

    public function index()
    {
        $paises = Pais::all();
        return view('preinscripcion.preinscripcionEquipo', compact('paises'));
    }

    //  para guardarAplicacion una preinscripcion
    public function store(Request $request)
    {
        $dateToday = date('m/d/Y');
        $transaccion = new Transaccion;
        $dateAfter = new DateTime('2022-07-01');
        $formulario = request()->except('_token');
        $aplicacionPreinscripcion = new Aplicacion;

        $request->validate([
            $this->telefono => ['required', 'max:15'],
            $this->numCuenta => ['required', 'max:255'],
            $this->correo => ['required', 'email', 'max:255'],
            $this->vaucher => ['required', 'image', 'max:10000'],
            $this->equipo => ['required', 'max:30', new AlphaSpaces],
            $this->encargado => ['required', 'max:50', new AlphaSpaces],
            $this->comprobantePago => ['required', 'max:50', new AlphaNumeric],
            $this->montoPagado => ['required', 'max:999999', 'integer', 'min:250'],
            $this->fecDeposito => [
                'required', 'date',
                'before:' . $dateToday, 'after:' . date_format($dateAfter, "d/m/Y")
            ],
        ]);

        $pais = Pais::where('NombrePais', '=', $formulario[config('constants.PAIS')])
            ->firstOrFail();
        $formulario[config('constants.VAUCHER_PAGO')] =
            $request->file(config('constants.VAUCHER_PAGO'))->store('uploads', 'public');

        try {
            $this->guardarAplicacion($aplicacionPreinscripcion, $pais, $formulario);
            $this->guardarTransaccion($transaccion, $aplicacionPreinscripcion->IdAplicacion, $formulario);
        } catch (\Throwable $th) {
            return back()->withError($th->getMessage())->withInput();
        }

        return redirect()->route('preinscripcion');
    }
    // para eliminar una preinscripcion
    public function destroy()
    {
    }

    public function edit()
    {
    }

    private function guardarAplicacion($aplicacionPreinscripcion, $pais, $formulario)
    {
        $aplicacionPreinscripcion->IdPreinscripcion = 1;
        $pais = Pais::where('NombrePais', '=', $formulario[config('constants.PAIS')])->firstOrFail();
        try {
            $aplicacionPreinscripcion->IdPais = $pais->IdPais;
        } catch (\Throwable $th) {
            throw new Exception('El CodigoPais ' . $formulario[config('constants.PAIS')] . ' no es válido', 2);
        }
        $aplicacionPreinscripcion->EstadoAplicacion = 'Pendiente';
        $aplicacionPreinscripcion->NombreEquipo =  $formulario[config('constants.NOMBRE_EQUIPO')];
        $aplicacionPreinscripcion->NombreUsuario = $formulario[config('constants.NOMBRE_ENCARGADO')];
        $aplicacionPreinscripcion->NumeroTelefono = $formulario[config('constants.TELEFONO_CONTACTO')];
        $aplicacionPreinscripcion->CorreoElectronico = $formulario[config('constants.CORREO_ELECTRONICO')];
        try {
            $opcionesCategorias = $formulario[$this->categorias];
        } catch (\Throwable $th) {
            throw new Exception('Debe seleccionar por lo menos una categoria', 2);
        }
        $categorias = "";
        for ($i = 0; $i < count($opcionesCategorias); $i++) {
            if ($i == count($opcionesCategorias) - 1) {
                $categorias = $categorias . $opcionesCategorias[$i];
            } else {
                $categorias = $categorias . $opcionesCategorias[$i] . ",";
            }
        }
        $aplicacionPreinscripcion->Categorias = $categorias;
        $aplicacionPreinscripcion->save();
    }

    private function guardarTransaccion($transaccion, $idAplicacion, $formulario)
    {
        $transaccion->IdAplicacion = $idAplicacion;
        $transaccion->NumeroCuenta = $formulario[config('constants.NUM_CUENTA')];
        $transaccion->NumeroTransaccion = $formulario[config('constants.DATOS_PAGO')];
        $transaccion->MontoTransaccion = $formulario[config('constants.MONTO_PAGAR')];
        $transaccion->FechaTransaccion = $formulario[config('constants.FEC_DEPOSITO')];
        $transaccion->FotoVaucher = $formulario[config('constants.VAUCHER_PAGO')];
        $transaccion->save();
    }
}
