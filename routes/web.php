<?php

use App\Http\Controllers\JugadorController;
use App\Http\Controllers\AplicacionController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/jugador/create',[JugadorController::class,'create']);
//Route::resource('jugador',JugadorController::class);
Route::get('jugador/create/{id}', [JugadorController::class,'create']);
Route::post('jugador/create/{id}',  [JugadorController::class, 'store']);
Route::get('/jugador/{id}',[JugadorController::class,'show']);
Route::get('/aplicaciones',[AplicacionController::class,'index']);
