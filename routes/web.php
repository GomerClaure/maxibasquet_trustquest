<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\AplicacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AplicacionesController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\MostrarJugadoresController;
use App\Http\Controllers\MostrarTecnicosController;
use App\Http\Controllers\ListaEquiposController;
use App\Http\Controllers\SubirLogoController;
use App\Http\Controllers\CuerpoTecnicoController;
use App\Http\Controllers\EditarJugadorController;
use App\Http\Controllers\TecnicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/formulario',FormularioController::class);
Route::resource('/listaequipos',ListaEquiposController::class);
Route::get('/editarJugadores/{equipo}/{categoria}',[EditarJugadorController::class,'lista']);
Route::resource('/editarJugadores',EditarJugadorController::class);


Route::get('/Equipo',[EquipoController::class,'index']);
Route::get('/MostrarJugadores',[MostrarJugadoresController::class,'index']);
Route::get('/MostrarTecnicos',[MostrarTecnicosController::class,'index']);
//Route::get('/equipo',[EquipoController::class,'index']);
//Route::get('/jugador/create',[JugadorController::class,'create']);
//Route::resource('jugador',JugadorController::class);
Route::get('tecnico/create/{id}', [CuerpoTecnicoController::class,'create']);
Route::post('tecnico/create/{id}',  [CuerpoTecnicoController::class, 'store']);
Route::put('/tecnico/{id}/update', [CuerpoTecnicoController::class,'update']);
Route::get('/tecnico/{id}/edit', [CuerpoTecnicoController::class,'edit']);
Route::get('tecnico/{equipo}/{categoria}',[CuerpoTecnicoController::class,'index']);

Route::get('jugador/create/{id}', [JugadorController::class,'create']);
Route::post('jugador/create/{id}',  [JugadorController::class, 'store']);
Route::get('/jugador/{id}',[JugadorController::class,'show']);
Route::get('/aplicaciones',[AplicacionController::class,'index']);
Route::get('/aplicaciones/{id}',[AplicacionController::class,'show']);
Route::get('/preinscripcion', [AplicacionesController::class,'index'])->name('preinscripcion');
Route::post('/aplicacionPreinscripcion', [AplicacionesController::class,'store'])->name('aplicacion');
Route::get('/subirLogo/{id}', [SubirLogoController::class,'index'])->name('subirLogo');
Route::post('/subirLogo', [SubirLogoController::class,'store'])->name('subirLogo');
Route::get('/tecnico/{id}',[TecnicoController::class,'show']);
Route::get('/tecnicos/{equipo}/{categoria}',[TecnicoController::class,'listaTecnicos']);
Route::get('/jugadores/{equipo}/{categoria}',[JugadorController::class,'listaJugadores']);
