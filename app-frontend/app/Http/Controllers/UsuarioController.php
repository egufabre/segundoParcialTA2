<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function ListarUsuarios(Request $request){
        $clientes = Http::get(getenv("APP_CLIENTES_URL") . "usuario") -> json();
        return view('listarUsuarios',["clientes" => $clientes]);
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

    public function AgregarUsuario(Request $request){
        $response = Http::post(getenv("APP_CLIENTES_URL") . "usuario", [
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo')
            #'tipo' => 1
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formAgregarUsuario',["exito" => true]);
        else {
            return "ERROR";
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

        $response = Http::post(getenv("APP_clientes_URL") . "modificar", [
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
        $response = Http::post(getenv("APP_clientes_URL") . "eliminar", [
            'id' => $request -> post('id'),
        ]) -> json();

        if($response["resultado"]=== "OK")
            return view('formEliminarUsuario',["exito" => true]);
        else {
            return "ERROR";
        }
    }
}
