<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ProductoController;


Route::get('/producto', [ProductoController::class,"Listar"]);
Route::get('/producto/{d}', [ProductoController::class,"ListarUno"]);
Route::post('/producto', [ProductoController::class,"Agregar"]);
Route::put('/producto', [ProductoController::class,"Modificar"]);
Route::delete('/producto', [ProductoController::class,"Eliminar"]);
=======

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
>>>>>>> cliente
