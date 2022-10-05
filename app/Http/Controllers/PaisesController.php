<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplicacion;
use App\Models\Pais;
use App\Models\Preinscripcion;
use App\Models\Transaccion;

class PaisesController extends Controller
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
            $datosEmpleado=request()->except('_token');
            if($request->hasFile('vaucher')){
                $datosEmpleado['vaucher']=$request->file('vaucher')->store('uploads','public');
            }
            $aplicacion = new Preinscripcion;
            $aplicacion->dba_insert;
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
