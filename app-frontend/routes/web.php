<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;


Route::get('/Listar', [UsuarioController::class,"ListarUsuarios"]);
Route::get('/agregarUsuario', function () {
    return view('formAgregarUsuario');
});
Route::post('/agregarUsuario', [UsuarioController::class,"AgregarUsuario"]);
