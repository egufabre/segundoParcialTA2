<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function ListarUsuarios(Request $request){
        $clientes = Http::get(getenv("APP_clientes_URL") . "usuario") -> json();
        return view('listarUsuarios',["usuarios" => $clientes]);
    }

    public function ListarUsuario(Request $request, $id_cliente){
        $u = Http::get(getenv("APP_clientes_URL") . "usuario/" . $id_cliente) -> json();
        return view('listarUsuario',["usuarios" => $u]);
    }

    private function obtenerDatosUsuario($id_cliente){
        $usuario = Http::get(getenv("APP_clientes_URL") . "usuario") -> json();
        foreach($usuario as $u){
            if($id_cliente == $u['id']){
                return array('nombre' => $u['nombre'], 'apellido' => $u['apellido'], 'telefono' => $u['telefono'], 'correo' => $u['correo'], 'tipo' => $u['tipo']);
            }
        }
    }

    private function obtenerDatosUsuarioPorCorreo($correo){
        $usuario = Http::get(getenv("APP_clientes_URL") . "usuario") -> json();
        foreach($usuario as $u){
            if($correo == $u['correo']){
                return array('nombre' => $u['nombre'], 'apellido' => $u['apellido'], 'telefono' => $u['telefono'], 'correo' => $u['correo'], 'tipo' => $u['tipo']);
            }
        }
    }

    public function AgregarUsuario(Request $request, $tipo){
        $response = Http::post(getenv("APP_clientes_URL") . "usuario", [
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
            'tipo' => $tipo
        ]) -> json();
        if($response["resultado"]=== "OK")
            return true;
        else {
            return "";
        }
    }

    public function ModificarUsuario(Request $request){
        $datosUsuario = $this -> obtenerDatosUsuario($request -> post('id'));
        $tipo = null;
        if ($datosUsuario['tipo'] == 0){
            $tipo = 0;
        }else{
            $tipo = 1;
        }

        $response = Http::put(getenv("APP_clientes_URL") . "modificar", [
            'id' => $request -> post('id'),
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
            'tipo' => $tipo
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formModificarUsuario',["exito" => true]);
        else {
            return "ERROR";
        }
    }

    public function EliminarUsuario(Request $request){
        $response = Http::delete(getenv("APP_clientes_URL") . "eliminar", [
            'id' => $request -> post('id'),
        ]) -> json();

        if($response["resultado"]=== "OK")
            return view('formEliminarUsuario',["exito" => true]);
        else {
            return "ERROR";
        }
    }

    public function Registro(Request $request){
        $response = http::post(getenv("APP_AUTENTICACION_URL") . "registro", [
            'name' => $request -> post('nombreUsuario'),
            'email' => $request -> post('correo'),
            'password' => $request -> post('password'),
        ]) -> json();
        if(isset($response["resultado"])){
            $cliente = $this -> AgregarUsuario($request, 0);
            return view('formAgregarUsuario',["exito" => $cliente]);
        }else {
            return "ERROR";
        }
    }

    public function RegistroVendor(Request $request){
        $response = http::post(getenv("APP_AUTENTICACION_URL") . "registro", [
            'name' => $request -> post('nombreUsuario'),
            'email' => $request -> post('correo'),
            'password' => $request -> post('password'),
        ]) -> json();
        if(isset($response["resultado"])){
            $vendedor = $this -> AgregarUsuario($request, 1);
            return view('formAgregarVendedor',["exito" => $vendedor]);
        }else {
            return "ERROR";
        }
    }

    public function Loguearse(Request $request){
        $response = http::post(getenv("APP_AUTENTICACION_URL") . "login", [
            'email' => $request -> post('email'),
            'password' => $request -> post('password'),
        ]) -> json();
        if(isset($response["message"])){
            return $response["message"];
        }else {
            return $this -> Logueo($request);
        }
    }

    public function Logueo(Request $request){
        $datos = $this -> obtenerDatosUsuarioPorCorreo($request -> post('email'));
        return $datos;
        if ($datos['tipo'] == 1)
            return "vendedor";
        return "cliente";
    }
}
