<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;

class ProductoController extends Controller
{
    
    public function Listar(Request $request){
        $productos = Producto::all();
        return $productos;
    }

    public function ListarUno(Request $request, $idProducto){
        $producto = Producto::where('id',$idProducto) ->first();
        return $producto;
    }
    
    public function Agregar(Request $request){
        $p = new Producto();
        $p -> nombre = $request -> post('nombre');
        $p -> descripcion = $request -> post('descripcion');
        $p -> stock = $request -> post('stock');

        $p -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Producto Agregado correctamente"
        );

        return $respuesta;
    }

    public function Modificar(Request $request){
        $p = Producto::where('id',$request -> post('id')) ->first();

        $p -> nombre = $request -> post('nombre');
        $p -> descripcion = $request -> post('descripcion');
        $p -> stock = $request -> post('stock');

        $p -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Producto Modificado correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $p = Producto::where('id',$request -> post('id')) ->first();
        $p -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Producto Eliminado correctamente"
        );
        return $respuesta;
    }  

    public function BajarStock(Request $request){
        $p = Producto::where('id',$request -> post('id')) ->first();
        $p -> stock = $p -> stock - $request -> post('stock');

        $p -> save();

        $respuesta = array(
            "resultado" => "Stock actualizado",
        );
        return $respuesta;
    }
}