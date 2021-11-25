<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;


Route::get('/producto', [ProductoController::class,"Listar"]);
Route::get('/producto/{d}', [ProductoController::class,"ListarUno"]);
Route::post('/producto', [ProductoController::class,"Agregar"]);
Route::put('/producto', [ProductoController::class,"Modificar"]);
Route::delete('/producto', [ProductoController::class,"Eliminar"]);
Route::get('/stock/{d}', [ProductoController::class,"obtenerStock"]); 
Route::put('/stock', [ProductoController::class,"BajarStock"]);