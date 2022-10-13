<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\AplicacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AplicacionesController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TransaccionController;
use App\Models\Jugador;

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

Route::resource('formulario',FormularioController::class);


Route::get('/Equipo',[EquipoController::class,'index']);

//Route::get('/jugador/create',[JugadorController::class,'create']);
//Route::resource('jugador',JugadorController::class);
Route::get('jugador/create/{id}', [JugadorController::class,'create']);
Route::post('jugador/create/{id}',  [JugadorController::class, 'store']);
Route::get('/jugador/{id}',[JugadorController::class,'show']);
Route::get('/aplicaciones',[AplicacionController::class,'index']);
Route::get('/aplicaciones/{id}',[AplicacionController::class,'show']);
Route::get('/preinscripcion', [AplicacionesController::class,'index'])->name('preinscripcion');
Route::post('/aplicacionPreinscripcion', [AplicacionesController::class,'store'])->name('aplicacion');
Route::get('/tecnico/{id}',[TecnicoController::class,'show']);
Route::get('/jugadores/{equipo}/{categoria}',[JugadorController::class,'listaJugadores']);
Route::get('/tecnicos/{equipo}/{categoria}',[TecnicoController::class,'listaTecnicos']);