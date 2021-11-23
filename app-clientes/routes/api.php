<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\UsuarioController;
>>>>>>> cliente

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

<<<<<<< HEAD
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
=======

Route::get('/usuario', [UsuarioController::class,"Listar"]);
Route::get('/usuario/{d}', [UsuarioController::class,"ListarUno"]);
Route::post('/usuario', [UsuarioController::class,"Agregar"]);
Route::post('/modificar', [UsuarioController::class,"Modificar"]);
Route::post('/eliminar', [UsuarioController::class,"Eliminar"]);
>>>>>>> cliente
