<?php
//Se declara el nombre del controlador primero
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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
    // return view('layaout.app');
    return view('dashboard');
})->name('Dashboard');

Route::get('/productos', [productosController::class,'index'])->name('indexProductos');
Route::get('productos/create', [productosController::class,'create'])->name('productosCreate');
Route::post('/productos', [productosController::class,'store'])->name('productosStore');

Route::get('/productos/{producto}/edit', [productosController::class,'edit'])->name('ProductosEdit');
Route::patch('/productos/{producto}', [productosController::class,'update'])->name('ProductosUpdate');
Route::delete('/productos/{producto}', [productosController::class,'destroy'])->name('ProductosDestroy');
Route::get('/registro', [RegistroController::class,'index'])->name('RegistroIndex');
Route::post('/registro', [RegistroController::class,'store'])->name('RegistroStore');
Route::get('/muro', [MuroController::class, 'index'])->name('MuroIndex');
Route::get('/login', [LoginController::class, 'index'])->name('LoginIndex');
Route::post('/login', [LoginController::class, 'store'])->name('LoginStore');
Route::post('/logout', [LogoutController::class, 'store'])->name('LogoutStore');