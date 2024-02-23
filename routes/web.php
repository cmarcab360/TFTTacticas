<?php

use App\Http\Controllers\RegistrerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
//Ruta para login
Route::get('/', function () {
    return view('welcome');
})->name('login');
//Ruta del perfil
Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth');
//Ruta Registro / ->middleware('guest') -> Estas rutas solo tienen logica cuando el usuario no está logueado,SOLO si eres un guest entras aqui (auth , caso contrario)
Route::get('/register', [RegistrerController::class, 'create'])->middleware('guest');
Route::post('/register', [RegistrerController::class, 'store'])->middleware('guest');
