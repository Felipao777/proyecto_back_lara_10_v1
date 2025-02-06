<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    public function funLogin(Request $request)
    {
        //validar
        $credenciales = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        //verificar
        if (!Auth::attempt($credenciales)){
            return response()->json(["message" => "No Autenticado"]);
        }
        //generar token
        $usuario = Auth::user();
        $token = $usuario->createToken("token_personal")->plainTextToken;
        //responder
        return response()->json([
            "access_token" => $token,
            "type_token" => "Bearer",
            "usuario" => $usuario
        ]);
    }

    public function funRegistro(Request $request)
    {
        //validar datos
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "c_password" => "required|same:password"
        ]);
        //guardar usuario User:: ....piuede ser para almacenamiento en masa
        $usuario = new User;
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        //$usuario->password = $request->password; Larav10 automaticamente lo cifra pero se
        //puede usar Hash::make($request->password) psero se debe importar la clase Hash
        //o tb usa bcrypt: $usuario->password = bcrypt($request->password);  
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        return response()->json(["messaje" => "usuario registrado"], 201);
    }
    public function funPerfil() {
        return Auth::user();
    }
    public function funSalir() {
        Auth::user()->tokens()->delete();
        return response()->json(["messaje" => "SALIO"]);
    }
}
