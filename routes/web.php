<?php

use App\Http\Controllers\PropiedadController;
use Illuminate\Support\Facades\DB;
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

//DB::listen(function ($e) {
//    dump($e->sql);
//});

Route::get("/propiedades", [PropiedadController::class, "index"])->name("propiedades");
Route::post('/propiedades', [PropiedadController::class, "store"]);

Route::get('listar',function () {
    $resultado= DB::select('select * from comunidades');
    return 'Listado de comunidades';
    
});


Route::middleware('auth')->resource('/comunidades', ComunidadController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
