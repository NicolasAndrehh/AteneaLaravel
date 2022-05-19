<?php
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\ServicioClienteController;
<<<<<<< HEAD
use App\Http\Controllers\ServicioController;

=======
use App\Http\Controllers\MiperfilController;
>>>>>>> ac54e46ea833c7196be72401254ddb83ed73244c
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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

Route::get('empleado/pdf', [App\Http\Controllers\EmpleadoController::class, 'PDF'])->name('empleados.pdf');
Route::get('usuario/pdf', [App\Http\Controllers\UsuarioController::class, 'PDF'])->name('usuarios.pdf');
Route::get('cliente/pdf', [App\Http\Controllers\ClienteController::class, 'PDF'])->name('clientes.pdf');
// Route::get('empleado/pdf', [App\Http\Controllers\EmpleadoController::class, 'PDF'])->name('empleados.pdf');

Route::resource('empleado', EmpleadoController::class);

Route::resource('usuario', UsuarioController::class);

Route::resource('cliente', ClienteController::class);

Route::resource('servicio', ServicioController::class);

Route::resource('servicioCliente', ServicioClienteController::class);

Route::resource('rol', RolController::class);

Route::resource('habitacion', HabitacionesController::class);

Route::resource('miperfil', MiperfilController::class);

Auth::routes();

// Route::get('/register', function(){
//     return view('auth.register');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
