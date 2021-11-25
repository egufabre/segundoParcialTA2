<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;

<<<<<<< HEAD
Route::get('/listarUsuarios', [UsuarioController::class,"ListarUsuarios"]);
Route::get('/listarUsuarios/{d}', [UsuarioController::class,"ListarUsuario"]);
=======

//USUARIOS

Route::get('/Listar', [UsuarioController::class,"ListarUsuarios"]);
Route::get('/Listar/{d}', [UsuarioController::class,"ListarUsuario"]);
>>>>>>> 6228a41a4000d9cba909c9177476d5524a5ee024

Route::get('/agregarCliente', function () {
    return view('formAgregarUsuario');
});
Route::post('/agregarCliente', [UsuarioController::class,"AgregarCliente"]);

Route::get('/agregarVendedor', function () {
    return view('formAgregarVendedor');
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

//PRODUCTOS

route::get('/listarProductos', [ProductoController::class,"ListarProductos"]);
Route::get('/agregarProductos', function () {
    return view('formAgregarProducto');
});

Route::post('/agregarProductos', [ProductoController::class,"AgregarProducto"]);
Route::post('/modificarProductos', [ProductoController::class,"ModificarProducto"]);
Route::get('/eliminarProductos', function () {
    return view('formEliminarProducto');
});
Route::post('/eliminarProductos', [ProductoController::class,"EliminarProductos"]);

//VENTAS

Route::get('/listarVentas', [VentaController::class,"Listar"]);
Route::get('/Listar/{d}', [VentaController::class,"ListarUno"]);

Route::post('/agregarVenta', [VentaController::class,"Agregar"]);
Route::post('/modificarVenta', [VentaController::class,"Modificar"]);
Route::get('/modificarVenta', [VentaController::class,"ModificarForm"]);
Route::get('/agregarVenta', function () {
    return view('formAgregarVenta');
});
Route::post('/eliminarVenta', [VentaController::class,"Eliminar"]);
Route::get('/eliminarVenta', function () {
    return view('formEliminarVenta');
});
