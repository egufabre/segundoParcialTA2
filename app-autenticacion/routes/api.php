<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Route::middleware('auth:passport')->get('/user', function (Request $request) {
 //   return $request->user();
//});

Route::post('/registro', [UserController::class,'registro']);
Route::post('/login', [UserController::class,'login']);
Route::post('/autenticar', [UserController::class,'autenticar']);
Route::post('/crearUsuario', [UserController::class,'crearUser']);



