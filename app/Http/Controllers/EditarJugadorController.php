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
        return view('editarJugadores.lista', compact('jugadores', 'equipo', 'categoria'));
    }

    public function edit(Request $request, $id)
    {
        $jugadores = DB::table('jugadores')
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

        $datos = Jugador::select(
            'personas.NombrePersona',
            'personas.ApellidoPaterno',
            'personas.FechaNacimiento',
            'personas.Edad',
            'personas.Foto',
            'jugadores.PesoJugador',
            'jugadores.EstaturaJugador',
            'jugadores.PosicionJugador',
            'jugadores.NumeroCamiseta',
            'personas.NacionalidadPersona',
            'categorias.NombreCategoria',
            'equipos.NombreEquipo'
        )
            ->join('personas', 'personas.IdPersona', '=', 'jugadores.IdPersona')
            ->join('equipos', 'equipos.IdEquipo', '=', 'jugadores.IdEquipo')
            ->join('categorias', 'categorias.IdCategoria', '=', 'jugadores.IdCategoria')
            ->where('IdJugador', '=', $id)
            ->get();
        echo "hola desde edit";
        return view('editarJugadores.edit', compact('categorias', 'id', 'paises,$datos'));
    }

    public function update()
    {
    }
}
