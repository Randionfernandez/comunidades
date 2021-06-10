<?php

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


//Route::resource('gastos', 'ControllerGastos');

Route::resource('distribucion', 'DistribucionGastosController');

Route::resource('cuentasBancarias','CuentasBancariasController');

Route::resource('movimientos','MovimientosController');

Route::resource('ingreso','IngresosController');

//Route::resource('liquidacion','LiquidacionController');

//Route::resource('propietario','PropietarioController');

//Route::resource('listaPropietarios', 'ListaPropietariosController');

//Route::resource('listaMovimientos', 'ListaMovimientosController');

//Route::resource('borraras', DistribucionGastosController::class)->parameters(['borraras' => 'borrar'])->names('pepe');

