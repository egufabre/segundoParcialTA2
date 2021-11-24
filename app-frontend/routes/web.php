<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;


Route::get('/Listar', [UsuarioController::class,"ListarUsuarios"]);

Route::get('/agregarUsuario', function () {
    return view('formAgregarUsuario');
});
Route::post('/agregarUsuario', [UsuarioController::class,"AgregarUsuario"]);

Route::get('/modificarUsuario', function () {
    return view('formModificarUsuario');
});
Route::post('/modificarUsuario', [UsuarioController::class,"ModificarUsuario"]);

Route::get('/eliminarUsuario', function () {
    return view('formEliminarUsuario');
});
Route::post('/eliminarUsuario', [UsuarioController::class,"EliminarUsuario"]);

route::get('/listarProductos', [ProductoController::class,"ListarProductos"]);
Route::get('/agregarProductos', function () {
    return view('formAgregarProducto');
});

Route::post('/agregarProducto', [ProductoController::class,"AgregarProducto"]);