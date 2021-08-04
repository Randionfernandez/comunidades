<?php
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PropiedadController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::Class,'index']);
//Route::get('/property/create',[PropiedadController::Class,'create']);