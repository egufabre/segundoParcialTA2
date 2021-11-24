<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Producto;



class ProductoController extends Controller
{
    public function ListarProductos(Request $request){
        $producto = Http::get(getenv("APP_PRODUCTOS_URL") . "producto") -> json();
        return view('listaProductos',["producto" => $producto]);
    }

    public function AgregarProducto(Request $request){
        $response = Http::post(getenv("APP_PRODUCTOS_URL") . "producto", [
            'nombre' => $request -> post('nombre'),
            'descripcion' => $request -> post('descripcion'),
            'stock' => $request -> post('stock'),
        ]) -> json();
        if($response["resultado"] === "OK")
        return view('formAgregarProducto',["exito" => true]);
        else {
            return "ERROR";
        }

    }

    public function EliminarProducto(Request $request){
        $response = Http::post(getenv("APP_PRODUCTOS_URL") . "producto", [
            'id' => $request -> post('id'),
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formEliminarProducto',["exito" => true]);
        }
}
