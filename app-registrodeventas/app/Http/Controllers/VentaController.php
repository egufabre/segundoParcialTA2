<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\Http;


class VentaController extends Controller
{
    public function Listar(Request $request){
        $ventas = Ventas::all();
        return $ventas;
    }

    public function ListarUno(Request $request, $idProducto){
        $venta = Ventas::where('id',$idProducto) ->first();
        return $venta;
    }
    public function Agregar(Request $request){
        $v = new Ventas();
        $v -> id_usuario = $request -> post('id_usuario');
        $v -> id_producto = $request -> post('id_producto');
         
        $v -> save();
        
        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Compra Realizada correctamente"
        );

        return $respuesta;
    }
    
    public function Modificar(Request $request){
        $v = Ventas::where('id',$request -> post('id')) ->first();
        $v -> id_usuario = $request -> post('id_usuario');
        $v -> id_producto = $request -> post('id_producto');

        $v -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Compra Modificada correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $v = Ventas::where('id',$request -> post('id')) ->first();
        $v -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Compra Eliminada correctamente"
        );
        return $respuesta;
    }  
}
