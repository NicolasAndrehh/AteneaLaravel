<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::resource('empleado', EmpleadoController::class);

Route::resource('usuario', UsuarioController::class);

Route::resource('rol', RolController::class);

Auth::routes();

// Route::get('/register', function(){
//     return view('auth.register');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
