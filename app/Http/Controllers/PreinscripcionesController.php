<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Preinscripcion;

class PreinscripcionesController extends Controller
{
    /*
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    //mostrar todos los elementos
        public function index()
        {
            echo "Holaaaaaaaaaaaaaaaaaaaa";
            $preinscripcion = Preinscripcion::find(2);
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
