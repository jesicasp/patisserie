<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CakesController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\VarianController;
use App\Http\Controllers\CakeVarianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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

Route::resource('/cakes', CakesController::class)->middleware('auth');

Route::resource('/chefs', ChefsController::class)->middleware('auth');;

Route::resource('/varians', VarianController::class)->middleware('auth');;

Route::resource('/cake-varian', CakeVarianController::class)->middleware('auth');;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
