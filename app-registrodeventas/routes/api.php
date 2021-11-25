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
Route::get('/venta', [VentaController::class,"listar"]);
Route::get('/venta/{d}', [VentaController::class,"ListarUno"]);
Route::post('/venta', [VentaController::class,"Agregar"]);
Route::put('/venta', [VentaController::class,"Modificar"]);
Route::delete('/venta', [VentaController::class,"Eliminar"]);
