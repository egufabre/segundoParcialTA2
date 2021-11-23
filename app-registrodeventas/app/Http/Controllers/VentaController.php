<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\Http;


class VentaController extends Controller
{
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
}
