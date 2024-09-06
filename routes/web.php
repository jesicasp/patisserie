<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/cakes', \App\Http\Controllers\CakesController::class);

Route::resource('/chefs', \App\Http\Controllers\ChefsController::class);

Route::resource('/varians', \App\Http\Controllers\VarianController::class);

Route::resource('/cake-varian', \App\Http\Controllers\CakeVarianController::class);



