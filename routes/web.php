<?php

use App\Http\Controllers\RegistrerController;
use App\Http\Controllers\CreateTeamController;
use App\Http\Controllers\CreateTeamRowController;
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

Route::get('/', function () {
    return view('welcome');
});
//Registro
Route::get('/register', [RegistrerController::class, 'create']);
Route::post('/register', [RegistrerController::class, 'store']);

//Agregar equipo
Route::get('/createTeam', [CreateTeamController::class, 'createTeam']);
Route::post('/createTeam', [CreateTeamController::class, 'storeTeam']);

//Agregar fila al equipo
Route::get('/createRow', [CreateTeamRowController::class, 'createRow']);
Route::post('/createRow', [CreateTeamRowController::class, 'storeRow']);