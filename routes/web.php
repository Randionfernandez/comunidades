<?php

use App\Http\Controllers\ActaController;
use App\Http\Controllers\ComunidadController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('portada');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	return view('dashboard');
})->name('dashboard');

// Route::resource('user',UserController::class)->names('user');

//comunidades
Route::middleware('auth')->resource('/comunidades', ComunidadController::class)->parameters(['comunidades'=> 'comunidad']);

//propietarios-usuarios resource
// Route::resource('user',UserController::class)->names('user');


//grupo de rutas listar usuarios,propietarios y comunidades con autentificación
Route::middleware(['auth:sanctum','verified'])->group( function () {
	//usuarios
  Route::resource('user',UserController::class)->names('user');
  Route::get('user/list',[UserController::class,'list'])->name('user.list');
  // Route::get('user/index',[UserController::class,'index'])->name('user.index');

   // Route::resource('user',\App\Http\Controllers\UserController);

	//propietarios
  Route::get('propietario/index',[PropietarioController::class,'index'])->name('propietario.index');
  Route::get('propietario/list',[PropietarioController::class,'list'])->name('propietario.list');
  Route::get('propietario/create',[PropietarioController::class,'create'])->name('propietario.create');

	//propiedades
  Route::get('propiedad/list',[PropiedadController::class,'list'])->name('propiedad.list');
  Route::get('propiedad/create',[PropiedadController::class,'create'])->name('propiedad.create');
  Route::get('propiedad/index',[PropiedadController::class,'index'])->name('propiedad.index');

  //actas
  Route::resource('acta',ActaController::class)->names('acta');
  //convocatorias
  Route::resource('convocatoria',ConvocatoriaController::class)->names('convocatoria');


});
