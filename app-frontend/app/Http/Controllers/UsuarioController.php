<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function ListarUsuarios(Request $request){
        $clientes = Http::get(getenv("APP_USUARIOS_URL") . "cliente") -> json();
        return view('listar',["clientes" => $clientes]);
    }

    public function AgregarUsuario(Request $request){
        $response = Http::post(getenv("APP_USUARIOS_URL") . "cliente", [
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formAgregarUsuario',["exito" => true]);
        else {
            return "ERROR";
        }
    }
}
