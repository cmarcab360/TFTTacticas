<?php

use App\Http\Controllers\RegistrerController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CreateTeamController;
use App\Http\Controllers\CreateTeamRowController;
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

//Ruta del perfil
Route::get('/profile', [ProfileController::class, 'profile'])->middleware('auth');

Route::get('/',[SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('/',[SessionsController::class, 'store'])->middleware('guest')->name('login');

//Ruta Registro / ->middleware('guest') -> Estas rutas solo tienen logica cuando el usuario no está logueado,SOLO si eres un guest entras aqui (auth , caso contrario)
Route::get('/register', [RegistrerController::class, 'create'])->middleware('guest');
Route::post('/register', [RegistrerController::class, 'store'])->middleware('guest');

//Ruta Logout
Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');
Route::get('logout',[SessionsController::class, 'destroy'])->middleware('auth');//Para cuando intento acceder sin estar logueado


//Agregar equipo
Route::get('/createTeam', [CreateTeamController::class, 'createTeam']);
Route::post('/createTeam', [CreateTeamController::class, 'storeTeam']);

//Agregar fila al equipo
Route::get('/createRow', [CreateTeamRowController::class, 'createRow']);
Route::post('/createRow', [CreateTeamRowController::class, 'storeRow']);

