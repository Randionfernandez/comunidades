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

Route::middleware('auth')->get('/comunidades/select/{comunidad}', [App\Http\Controllers\ComunidadController::class, 'select'])->name('comunidades.select');
//Route::resource('/comunidades', ComunidadController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('distribucion', 'DistribucionGastosController');

//Route::resource('distribucion', GastoController::class);

Route::resource('cuentasBancarias', CuentasBancariasController::class)->parameters(['cuentasBancarias' => 'cuentasBancarias']);

Route::resource('liquidacion', LiquidacionController::class);

Route::resource('movimientos', MovimientosController::class);

Route::resource('ingresos', IngresosController::class);

Route::resource('propiedades', 'PropiedadController')->parameters(['propiedades' => 'propiedad']);

Route::get('listar',function () {
    $resultado= DB::select('select * from comunidades');
    return 'Listado de comunidades';
    
});

Route::resource('propietario','PropietarioController');

Route::resource('listaPropietarios', 'ListaPropietariosController');

Route::resource('listaMovimientos', 'ListaMovimientosController');

Route::get('proveedores/index/{comunidad?}', [App\Http\Controllers\ProveedorController::class , 'pasarComunidad'])->name('proveedores.pasarComunidad');

Route::resource('proveedores', ProveedorController::class, ['except' => ['index']])->parameters(['proveedores' => 'proveedor'])->names('proveedores');

Route::resource('juntas', JuntaController::class)->parameters(['juntas' => 'junta'])->names('juntas');

Route::get('/contenedor', function (ContainerInterface $container) {
    return dd($container);
})->name('contenedor');
