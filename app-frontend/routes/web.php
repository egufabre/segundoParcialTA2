<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;

Route::get('/listarUsuarios', [UsuarioController::class,"ListarUsuarios"]);
Route::get('/listarUsuarios/{d}', [UsuarioController::class,"ListarUsuario"]);

Route::get('/registro', function () {
    return view('formAgregarUsuario');
});
Route::post('/registro', [UsuarioController::class,"Registro"]);

Route::get('/vendor/registro', function () {
    return view('formAgregarVendedor');
});
Route::post('/vendor/registro', [UsuarioController::class,"RegistroVendor"]);

Route::get('/login', function () {
    return view('formLoguearse');
});
Route::post('/login', [UsuarioController::class,"Loguearse"]);

Route::get('/logout', function () {
    return view('formLoguearse');
});

Route::get('/modificarUsuario', function () {
    return view('formModificarUsuario');
});
Route::post('/modificarUsuario', [UsuarioController::class,"ModificarUsuario"]);

Route::get('/eliminarUsuario', function () {
    return view('formEliminarUsuario');
});
Route::post('/eliminarUsuario', [UsuarioController::class,"EliminarUsuario"]);

//PRODUCTOS

Route::get('/listarProductos', [ProductoController::class,"ListarProductos"]);
Route::get('/agregarProductos', function () {
    return view('formAgregarProducto');
});
Route::get('/modificarProductos', function () {
    return view('formModificarProducto');
});
Route::post('/agregarProductos', [ProductoController::class,"AgregarProducto"]);
Route::post('/modificarProductos', [ProductoController::class,"ModificarProducto"]);
Route::get('/eliminarProductos', function () {
    return view('formEliminarProducto');
});
Route::post('/eliminarProductos', [ProductoController::class,"EliminarProducto"]);

//VENTAS

Route::get('/listarVentas', [VentaController::class,"Listar"]);
Route::get('/Listar/{d}', [VentaController::class,"ListarUno"]);

Route::post('/agregarVenta', [VentaController::class,"Agregar"]);
Route::post('/modificarVenta', [VentaController::class,"Modificar"]);
Route::get('/agregarVenta', function () {
    return view('formAgregarVenta');
});
Route::get('/modificarVenta', function () {
    return view('formModificarVenta');
});
Route::post('/eliminarVenta', [VentaController::class,"Eliminar"]);
Route::get('/eliminarVenta', function () {
    return view('formEliminarVenta');
});
