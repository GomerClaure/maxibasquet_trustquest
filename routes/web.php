<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\AplicacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\AplicacionesController;
use App\Http\Controllers\CredencialController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\MostrarJugadoresController;
use App\Http\Controllers\MostrarTecnicosController;
use App\Http\Controllers\ListaEquiposController;
use App\Http\Controllers\SubirLogoController;
use App\Http\Controllers\CuerpoTecnicoController;
use App\Http\Controllers\EditarJugadorController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\JugadorQrController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TecnicoQrController;
use App\Http\Controllers\JuezController;

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
//Cualquier persona
Route::get('/preinscripcion', [AplicacionesController::class,'index'])->name('preinscripcion');
Route::post('/aplicacionPreinscripcion', [AplicacionesController::class,'store'])->name('aplicacion');
Route::get('/Equipo',[EquipoController::class,'index']);
Route::get('/tecnicos/{equipo}/{categoria}',[TecnicoController::class,'listaTecnicos']);
Route::get('/tecnico/{id}',[TecnicoController::class,'show']);
Route::get('/jugadores/{equipo}/{categoria}',[JugadorController::class,'listaJugadores']);
Route::get('/jugador/{id}',[JugadorController::class,'show']);
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('historia',[HistoriaController::class,'index']);
Route::resource('/listaequipos',ListaEquiposController::class);
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'verificarInicioSesion']);


Route::get('logout',[LogoutController::class,'logout'])->middleware(['auth']);

//Usuario Administrador
Route::get('/aplicaciones',[AplicacionController::class,'index'])->middleware(['auth']);
Route::get('/aplicaciones/{id}',[AplicacionController::class,'show'])->middleware(['auth']);
Route::resource('/formulario',FormularioController::class)->middleware(['auth']);
Route::get('juez/create',[JuezController::class,'create'])->middleware(['auth']);
Route::post('juez/create',[JuezController::class,'store']);

//Usuario Delegado
Route::get('jugador/create/{id}', [JugadorController::class,'create'])->middleware(['auth']);
Route::post('jugador/create/{id}',  [JugadorController::class, 'store']);
Route::get('tecnico/create/{id}', [CuerpoTecnicoController::class,'create'])->middleware(['auth']);
Route::post('tecnico/create/{id}',  [CuerpoTecnicoController::class, 'store']);
Route::get('/subirLogo/{id}', [SubirLogoController::class,'index'])->name('subirLogo')->middleware(['auth']);
Route::post('/subirLogo', [SubirLogoController::class,'store'])->name('subirLogo');
Route::put('/tecnico/{id}/update', [CuerpoTecnicoController::class,'update']);
Route::get('/tecnico/{id}/edit', [CuerpoTecnicoController::class,'edit'])->middleware(['auth']);
Route::patch('/editarJugadores/{id}',[EditarJugadorController::class,'update']);
Route::get('/editarJugadores',[EditarJugadorController::class,'index'])->middleware(['auth']);
Route::get('/editarJugadores/{id}/edit',[EditarJugadorController::class,'edit'])->middleware(['auth']);
Route::get('/editarJugadores/{equipo}/{categoria}',[EditarJugadorController::class,'show'])->middleware(['auth']);
Route::get('/equipo/delegado',[EquipoController::class,'indexDelegado'])->middleware(['auth']);
Route::get('/MostrarJugadores',[MostrarJugadoresController::class,'index'])->middleware(['auth']);
Route::get('/MostrarTecnicos',[MostrarTecnicosController::class,'index'])->middleware(['auth']);
Route::get('tecnico/{equipo}/{categoria}',[CuerpoTecnicoController::class,'index'])->middleware(['auth']);
Route::get('/qr',[CredencialController::class,'qr'])->middleware(['auth']);
Route::get('/credenciales/{equipo}/{categoria}',[CredencialController::class,'credencialesDeEquipo'])->middleware(['auth']);
Route::get('/credenciales/generar/{equipo}/{categoria}',[CredencialController::class,'generarCredenciales'])->middleware(['auth']);
Route::get('/credenciales/pdf/{equipo}/{categoria}',[CredencialController::class,'credencialesPdf'])->middleware(['auth']);
Route::get('/jugadorqr/{id}',[JugadorQrController::class,'index'])->middleware(['auth']);
Route::get('/tecnicoqr/{id}',[TecnicoQrController::class,'index'])->middleware(['auth']);
Route::get('/delete/tecnico/{id}',[TecnicoController::class,'destroy'])->middleware(['auth']);
