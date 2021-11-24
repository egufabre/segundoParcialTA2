<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Ventacontroller extends Controller
{
    public function Listar(Request $request){
        $ventas = Http::get(getenv('APP_REGISTRO_URL') . "listar")->json();
        return View('listarVenta',["ventas" => $ventas]);
 
    }
    private function obtenerDatosUsuario($id_usuario){
     $usuarios = Http::get(getenv("APP_CLIENTES_URL") . "usuario") -> json();
     foreach($usuarios as $usuario){
         if($id_usuario == $usuario['id']){
             return array('nombre' => $usuario['nombre'], 'apellido' => $usuario['apellido']);
         }
     }
 }
    public function ListarUno(Request $request ){
     $registro = Http::get(getenv('APP_REGISTRO_URL') . "reserva")->json();
     return View('listarVentas',["registro" => $registro]);
 
 }
 
    public function Agregar(Request $request){
        $response = Http::post(getenv('APP_REGISTRO_URL') . "agregar" , [
         'id_producto' => $request->post('id_producto'),
         'id_usuario' => $request->post('id_usuario')
        ])-> json(); 
 
        if($response["resultado"] === "OK")
            return view('formAgregarVenta' , ["exito" => true]);
         else {
              return "ERROR";
         }
    }
 
    public function Modificar(Request $request){
         $response = Http::post(getenv('APP_REGISTRO_URL') . "modificar" , [
             'id' => $request->post('id'),
             'id_usuario' => $request->post('id_usuario'),
             'id_producto' => $request->post('id_producto')
         ])-> json(); 
  
         if($response["resultado"] === "OK")
             return view('formAgregarVenta' , ["exitoModificar" => true]);
    }
    public function ModificarForm(Request $request){
     return view('formAgregarVenta',['ventas' => '']);
 }
}