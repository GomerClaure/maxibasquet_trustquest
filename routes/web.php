<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreinscripcionesController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\AplicacionesController;
use App\Models\Preinscripcion;


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
// Route::get('/preinscripcion', function () {
//     return view('preinscripcion');
// });

Route::get('/preinscripcion', [AplicacionesController::class,'index'])->name('preinscripcion');


Route::post('/aplicacionPreinscripcion', [AplicacionesController::class,'store'])->name('aplicacion');
