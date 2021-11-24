<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    public function Listar(Request $request){
        $usuarios = Usuario::all();
        return $usuarios;
    }

    public function ListarUno($idSocio){
        $usuario = Usuario::where('id',$idSocio) ->first();
        return $usuario;
    }

    public function Agregar(Request $request){
        $u = new Usuario();
        $u -> nombre = $request -> post('nombre');
        $u -> apellido = $request -> post('apellido');
        $u -> correo = $request -> post('correo');
        $u -> telefono = $request -> post('telefono');
        $u -> tipo = $request -> post('tipo');

        $u -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Usuario Agregado correctamente"
        );

        return $respuesta;
    }

    public function Modificar(Request $request){
        $u = Usuario::where('id',$request -> post('id')) ->first();

        $u -> nombre = $request -> post('nombre');
        $u -> apellido = $request -> post('apellido');
        $u -> correo = $request -> post('correo');
        $u -> telefono = $request -> post('telefono');
        $u -> tipo = $request -> post('tipo');

        $u -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Usuario Modificado correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $u = Usuario::where('id',$request -> post('id')) ->first();
        $u -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Usuario Eliminado correctamente"
        );
        return $respuesta;
    }
}
