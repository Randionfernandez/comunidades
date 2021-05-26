<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
//use App\Services\Transistor;
use Psr\Container\ContainerInterface;

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


Route::middleware('auth')->resource('/comunidades', ComunidadController::class)->parameters(['comunidades'=> 'comunidad']);

//Route::resource('/comunidades', ComunidadController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('gastos', GastosController::class);

Route::resource('distribucion', DistribucionGastosController::class);

Route::resource('cuentasBancarias', CuentasBancariasController::class);

Route::resource('liquidacion', LiquidacionController::class);

Route::resource('movimientos', MovimientosController::class);

Route::resource('ingresos', IngresosController::class);

Route::get('/contenedor', function (ContainerInterface $container) {
    return dd($container);
})->name('contenedor');


//asigna los propietarios a las usuarios
Route::resource('/propietarios', PropietarioController::class);

//vistas con livewire; componentes creados para porpietarios
Route::view('propietarios', 'propiedades.propietarios');

