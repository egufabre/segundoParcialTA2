<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


use App\Models\User;
use Laravel\Passport\Passport;


class UserController extends Controller
{
    public function Login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Hash::check($credentials)) {
            return response([
                "message" => "Usuario Autenticado"
            ]);
        }
        else{
            return response([
                'message' => "Email o contraseña invalidos"
            ]);
        }
        

    }
    public function crearUser(Request $request){
            $u = new User();
            $u -> name = $request -> post("name");
            $u -> email = $request -> post("email");
            $u -> password = $request -> post("password"); 
            $u -> save();

            $respuesta = array(
                "resultado" => "OK",
                "mensaje" => "Usuario Agregado correctamente"
            );
    
            return $respuesta;
     }
     public function Logout(Request $request) {

        $request->validate([
            'email' => ['required', 'email'], 
            'password'=> ['required']

        ]);
        $user= User::Where ('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['Tus datos son incorrectos'],
                
            ]);
        }
        $user->createToken('Auth Token')->accessToken;
        return $user;
    }

}
