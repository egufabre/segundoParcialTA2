<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;


Route::get('/Listar', [UsuarioController::class,"ListarUsuarios"]);
Route::get('/Listar/{d}', [UsuarioController::class,"ListarUsuario"]);

Route::get('/agregarCliente', function () {
    return view('formAgregarUsuario');
});
Route::post('/agregarCliente', [UsuarioController::class,"AgregarUsuario"]);

Route::get('/agregarVendedor', function () {
    return view('formAgregarUsuario');
});
Route::post('/agregarVendedor', [UsuarioController::class,"AgregarVendedor"]);

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

Route::post('/agregarProductos', [ProductoController::class,"AgregarProducto"]);

Route::get('/eliminarProductos', function () {
    return view('formEliminarProducto');
});
Route::post('/eliminarProductos', [ProductoController::class,"EliminarProductos"]);

Route::get('/listarVentas', [VentaController::class,"Listar"]);
Route::get('/Listar/{d}', [VentaController::class,"ListarUno"]);

Route::post('/agregarVenta', [VentaController::class,"Agregar"]);
Route::get('/agregarVenta', function () {
    return view('formAgregarVenta');
});
