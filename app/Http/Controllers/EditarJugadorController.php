<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

use App\Models\Equipo;
use App\Models\Categoria;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;


class EditarJugadorController extends Controller
{
    public function index()
    {
        $eq = Equipo::select('equipos.NombreEquipo')
            ->get();
        echo "hola index";

        //Nombre y Pais de un equipo Categoria
        $c = Equipo::select('paises.NombrePais', 'equipos.NombreEquipo', 'equipos.LogoEquipo', 'categorias.NombreCategoria')
            ->join('aplicaciones', 'equipos.IdAplicacion', '=', 'aplicaciones.IdAplicacion')
            ->join('paises', 'aplicaciones.IdPais', '=', 'paises.IdPais')
            ->join('categorias_por_equipo', 'equipos.IdEquipo', '=', 'categorias_por_equipo.IdEquipo')
            ->join('categorias', 'categorias_por_equipo.IdCategoria', '=', 'categorias.IdCategoria')
            ->get();

        $EquiposDatos = [];
        $Cat = [];
        $arreglo = [];

        for ($i = 0; $i < count($eq); $i++) {
            $var = ($eq[$i])["NombreEquipo"];
            foreach ($c as $cop) {
                $nombre = $cop["NombreEquipo"];
                if ($nombre == $var) {
                    $pais = $cop["NombrePais"];
                    $categoria = $cop["NombreCategoria"];
                    $logo = $cop["LogoEquipo"];
                    $f = array("id" => $categoria);
                    $new = array_push($Cat, $f);
                }
            }
            $EquiposDatos = array("NombreEquipo" => $var, "Categorias" => $Cat, "NombrePais" => $pais, "LogoEquipo" => $logo);
            $new = array_push($arreglo, $EquiposDatos);
            $Cat = [];
        }
        $s = [];
        echo "hola index";

        return view('editarJugadores.equipos', compact('arreglo'));
    }

    /* public function show($id)
    {

    }*/

    public function formatoFecha($jugador)
    {
        if (!$jugador->isEmpty()) {
            foreach ($jugador as $jug) {
                $fechas = explode("-", $jug->FechaNacimiento);
                $formato = $fechas[2] . "/" . $fechas[1] . "/" . $fechas[0];
                $jug->FechaNacimiento = $formato;
            }
        }

        return $jugador;
    }

    public function show($equipo, $categoria)
    {
        $jugadores = Jugador::select(
            'personas.NombrePersona',
            'personas.ApellidoPaterno',
            'jugadores.PosicionJugador',
            'jugadores.IdJugador',
            'personas.Foto',
            'jugadores.NumeroCamiseta'
        )
            ->join('personas', 'jugadores.IdPersona', '=', 'personas.IdPersona')
            ->join('equipos', 'jugadores.IdEquipo', '=', 'equipos.IdEquipo')
            ->join('categorias', 'jugadores.IdCategoria', 'categorias.IdCategoria')
            ->where('equipos.NombreEquipo', '=', $equipo)
            ->where('categorias.NombreCategoria', '=', $categoria)
            ->get();

        $equipos = Equipo::select('NombreEquipo', 'NombreCategoria')
            ->join('categorias_por_equipo', 'categorias_por_equipo.IdEquipo', 'equipos.IdEquipo')
            ->join('categorias', 'categorias_por_equipo.IdCategoria', '=', 'categorias.IdCategoria')
            ->where('equipos.NombreEquipo', '=', $equipo)
            ->where('categorias.NombreCategoria', '=', $categoria)
            ->get();
        if (!$equipos->isEmpty()) {
            $equipo = $equipos[0]->NombreEquipo;
            $categoria = $equipos[0]->NombreCategoria;
        } else {
            $equipo = null;
            $categoria = null;
        }
        echo "hola desde lista";
        $deleteJugador=[];
        return view('editarJugadores.lista', compact('jugadores', 'equipo', 'categoria','deleteJugador'));
    }

    public function edit(Request $request, $id)
    {
        /* $jugadores = DB::table('jugadores')
            ->select('IdCategoria')
            ->where('IdEquipo', $id)
            ->distinct()
            ->get();

        $arreglo = array();
        $contador = 0;
        foreach ($jugadores as $categoria) {
            $arreglo[$contador] = $categoria->IdCategoria;
            $contador++;
        }

        $categorias = DB::table('categorias')
            ->select('*')
            ->whereIn('IdCategoria', $arreglo)
            ->get();

        $paises = DB::table('paises')
            ->orderBy('NombrePais', 'asc')
            ->get();

        $jugador = Jugador::select(
            'personas.NombrePersona',
            'personas.ApellidoPaterno',
            'personas.ApellidoMaterno',
            'personas.FechaNacimiento',
            'personas.SexoPersona',
            'personas.Edad',
            'personas.Foto',
            'personas.CiPersona',
            'jugadores.PesoJugador',
            'jugadores.EstaturaJugador',
            'jugadores.PosicionJugador',
            'jugadores.NumeroCamiseta',
            'jugadores.FotoCarnet',
            'personas.NacionalidadPersona',
            'categorias.NombreCategoria',
            'equipos.NombreEquipo'
        )
            ->join('personas', 'personas.IdPersona', '=', 'jugadores.IdPersona')
            ->join('equipos', 'equipos.IdEquipo', '=', 'jugadores.IdEquipo')
            ->join('categorias', 'categorias.IdCategoria', '=', 'jugadores.IdCategoria')
            ->where('IdJugador', '=', $id)
            ->get();
            $datos = $this->formatoFecha($jugador);
            if ($id <= 0 || $id >= 9000000000000000000 || $jugador->isEmpty()) {
                $mensaje = "No encontrado";
                return $mensaje;
            }

        //$jugador = Jugador::find($id);
        $datos = $jugador[0];
        echo $datos;
        //return view('editarJugadores.edit', compact('datos'));

        return view('editarJugadores.edit', compact('categorias', 'id', 'paises', 'datos'));*/

        $tecnicos = DB::table('jugadores')
            ->select('*')
            ->join('personas', 'jugadores.IdPersona', '=', 'personas.IdPersona')
            ->where('IdJugador', $id)
            ->get();

        $datos = $tecnicos[0];
        $cuerpoTecnico = DB::table('jugadores')
            ->select('IdCategoria')
            ->where('IdEquipo', $datos->IdEquipo)
            ->distinct()
            ->get();

        $arreglo = array();
        $contador = 0;
        foreach ($cuerpoTecnico as $categoria) {
            $arreglo[$contador] = $categoria->IdCategoria;
            $contador++;
        }

        $categorias = DB::table('categorias')
            ->select('*')
            ->whereIn('IdCategoria', $arreglo)
            ->get();

        $equipo = Equipo::find($datos->IdEquipo);

        $paises = DB::table('paises')
            ->orderBy('NombrePais', 'asc')
            ->get();
        return view('editarJugadores.edit', compact('categorias', 'datos', 'equipo', 'paises'));
    }

    public function update($id, Request $request)
    {
        date_default_timezone_set('America/La_Paz');
        $fechaActual = date('Y-m-d');
        $anio = date('Y') - 100;
        $fecha = $anio . "-01-01";

        $request->validate([
            'ci' => 'required|numeric|digits_between:6,9',
            'nombre' => 'required|min:3|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoPaterno' => 'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'apellidoMaterno' => 'required|min:2|regex:/^([A-Z][a-z, ]+)+$/',
            'fechaNacimiento' => 'required|date|before:' . $fechaActual . '|after:' . $fecha . '|regex:/^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/',
            'selectNacionalidad' => 'required',
            'selectSexo' => 'required',
            'edad' => 'required|numeric|min:1|max:100',
            'fotoJugador' => 'image|dimensions:width=472, height=472',
            'selectCategoria' => 'required',
            'estatura' => 'required|regex:/^[1-2]{1}[.][0-9]{2}$/',
            'peso' => 'required|numeric|min:1|max:99',
            'fotoCarnet' => 'image',
            'posicion' => 'required',
            'nCamiseta' => 'required|numeric|min:1|max:99'
        ]);


        //$datosTecnico = $request->except(['_token','_method']);

        $carnetId = $request->ci;
        $consulta2 = DB::table('personas')
            ->select('CiPersona')
            ->where('CiPersona', $carnetId, 1)
            ->get();

        $jugadores = DB::table('jugadores')
            ->select('*')
            ->join('personas', 'jugadores.IdPersona', '=', 'personas.IdPersona')
            ->where('IdJugador', $id)
            ->get();
        $jugador = $jugadores[0];

        if (!$consulta2->isEmpty() && $request->ci != $jugador->CiPersona) {
            return back()->withInput()->with('mensajeErrorExiste', 'El Ci esta registrado');
        }

        $fecha = $request->fechaNacimiento;
        $anio = substr($fecha, 0, 4);
        $edadReal = date('Y') - $anio;
        $edadActual = $request->edad;
        if ($edadReal != $edadActual) {
            return back()->withInput()->with('mensajeErrorEdad', 'La edad no coincide con la fecha de nacimiento');
        }

        $categoria = $request->selectCategoria;
        $consulta = Categoria::where('IdCategoria', $categoria)->get();
        $categoriaNum = substr($consulta[0]->NombreCategoria, 1, 3);

        if ($edadActual < $categoriaNum) {
            return back()->withInput()->with('mensajeErrorCategoria', 'La edad del jugador es inferior a la categoria elegida');
        }


        $persona = Persona::find($jugador->IdPersona);
        $persona->CiPersona = $request->ci;
        $persona->NombrePersona = $request->nombre;
        $persona->ApellidoPaterno = $request->apellidoPaterno;
        $persona->ApellidoMaterno = $request->apellidoMaterno;
        $persona->FechaNacimiento = $request->fechaNacimiento;
        $persona->NacionalidadPersona = $request->selectNacionalidad;
        $persona->SexoPersona = $request->selectSexo;
        $persona->Edad = $request->edad;
        if ($request->hasFile('fotoJugador')) {
            $persona->Foto = $request->file('fotoJugador')->store('uploads', 'public');
        }
        $persona->save();

        $cuerpoTecnico = Jugador::find($id);
        $cuerpoTecnico->IdCategoria = $request->selectCategoria;
        $cuerpoTecnico->PosicionJugador = $request->selectRol;
        if ($request->hasFile('fotoCarnet')) {
            $cuerpoTecnico->FotoCarnet = $request->file('fotoCarnet')->store('uploads', 'public');
        }
        $cuerpoTecnico->save();

        $equipo = Equipo::find($cuerpoTecnico->IdEquipo);
        $categoria = Categoria::find($request->selectCategoria);
        return redirect('editarJugadores/' . $equipo->NombreEquipo . '/' . $categoria->NombreCategoria)->with('mensaje', 'Se inscribio al tecnico correctamente');
    }

    public function Modal($id){

        $deleteJugador= Jugador::select('personas.NombrePersona','personas.ApellidoPaterno','personas.ApellidoMaterno','personas.Foto')
                                 ->join('personas','personas.IdPersona','=','jugadores.IdPersona')
                                 ->where('jugadores.IdJugador','=',$id)
                                 ->get();
               // return view('editarJugadores.lista', compact('jugadores', 'equipo', 'categoria','deleteJugador'));
                        //return $deleteJugador;
    }
}
