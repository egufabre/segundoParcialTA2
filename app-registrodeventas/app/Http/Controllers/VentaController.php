<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;



class VentaController extends Controller
{
    private function obtenerDatosUsuario($id_usuario){
        $usuarios= Http::get(getenv("APP_CLIENTES_URL") . "usuario") -> json();
        foreach($usuarios as $usuario){
            if($id_usuario == $usuario['id']){
                return array('nombre' =>$usuario['nombre'], 'apellido' => $usuario['apellido']);
            }
        }
    }

    private function obtenerDatosProducto($id_producto){
        $productos = Http::get(getenv("APP_PRODUCTOS_URL") . "producto") -> json();
        foreach($productos as $producto){
            if($id_producto == $producto['id']){
                return array('nombre' =>$producto['nombre'], 'stock' => $producto['stock']);
            }
        }
    }
    
    private function obtenerDatosDeVentas($ventas){
        $ventasConDatosCompletos = [];
        foreach($ventas as $v){
            $datosUsuario = $this -> obtenerDatosUsuario($v ->id_usuario);
            $datosProducto = $this -> obtenerDatosProducto($v ->id_producto);

            $fila = [
                'id' => $v->id,
                'id_usuario' => $v->id_usuario,
                'id_producto' => $v->id_producto,
                'nombre_producto' =>$datosProducto['nombre'],
                'stock' =>$datosProducto['stock'],
                'nombre' =>$datosUsuario['nombre'],
                'apellido' =>$datosUsuario['apellido'],

            ];
            array_push($ventasConDatosCompletos,$fila);
        }
        return $ventasConDatosCompletos;
    }
    public function Listar(Request $request){
        $ventas = Ventas::all();
        return $this->obtenerDatosDeVentas($ventas);
    }

    public function ListarUno(Request $request, $idProducto){
        $venta = Ventas::where('id',$idProducto) ->first();
        return $venta;
    }
    public function Agregar(Request $request){
        $v = new Ventas();
        $v -> id_usuario = $request -> post('id_usuario');
        $v -> id_producto = $request -> post('id_producto');
        $v -> stock = $request -> post('stock');

        $v -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Compra Realizada correctamente"
        );

        return $this->BajarStock($request);
    }

    public function Modificar(Request $request){
        $v = Ventas::where('id',$request -> post('id')) ->first();
        $v -> id_usuario = $request -> post('id_usuario');
        $v -> id_producto = $request -> post('id_producto');
        $v -> stock = $request -> post('stock');


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
    public function BajarStock(Request $request){
        $response = Http::put(getenv("APP_PRODUCTOS_URL") . "stock", [
            'id' => $request -> post('id_producto'),
            'stock' => $request -> post('stock'),
        ]) -> json();
        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Venta Agregada correctamente"
        );
        return $respuesta;
    }
}
