<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function ListarUsuarios(Request $request){
        $u = Http::get(getenv("APP_clientes_URL") . "usuario") -> json();
        return view('listarUsuarios',["usuarios" => $u]);
    }

    public function AgregarUsuario(Request $request){
        $response = Http::post(getenv("APP_clientes_URL") . "usuario", [
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
            'tipo' => 0
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formAgregarUsuario',["exito" => true]);
        else {
            return "ERROR";
        }
    }

    public function AgregarVendedor(Request $request){
        $response = Http::post(getenv("APP_clientes_URL") . "usuario", [
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
            'tipo' => 1
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formAgregarUsuario',["exito" => true]);
        else {
            return "ERROR";
        }
    }

    public function ModificarUsuario(Request $request){
        $response = Http::post(getenv("APP_clientes_URL") . "usuario", [
            'id' => $request -> post('id'),
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formModificarUsuario',["exitoModificar" => true]);
        }

        public function EliminarUsuario(Request $request){
            $response = Http::post(getenv("APP_clientes_URL") . "usuario", [
                'id' => $request -> post('id'),
            ]) -> json();

            if($response["resultado"]=== "OK")
            return view('formEliminarUsuario',["exito" => true]);
            }
}
