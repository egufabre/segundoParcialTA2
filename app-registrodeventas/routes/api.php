<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;


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
Route::get('/listar', [VentaController::class,"listar"]);
Route::get('/listar/{d}', [VentaController::class,"ListarUno"]);
Route::post('/agregar', [VentaController::class,"Agregar"]);
Route::post('/modificar', [VentaController::class,"Modificar"]);
Route::post('/eliminar', [VentaController::class,"Eliminar"]);
