<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            "email" => "required|email|max:255",
            "password" => "required|string|min:8|max:255"
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "message" => "Credenciales incorrectas"
            ], 401);
        }
        ;

        $token = $user->createToken($user->name . 'Auth-Token')->plainTextToken;

        return response()->json([
            "message" => "Login correcto",
            "token" => $token,
            "token_type" => "Bearer"
        ], 200);
    }




    public function register(Request $request): JsonResponse
    {
        $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email|max:255",
            "password" => "required|string|min:8|max:255"
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        if ($user) {
            $token = $user->createToken($user->name . 'Auth-Token')->plainTextToken;

            return response()->json([
                "message" => "Registro correcto",
                "token" => $token,
                "token_type" => "Bearer"
            ], 201);
        } else {
            if ($user) {
                $token = $user->createToken($user->name . 'Auth-Token')->plainTextToken;

                return response()->json([
                    "message" => "Error al registrar",

                ], 500);
            }
        }
        ;

    }

    public function profile(Request $request): JsonResponse
    {
        if ($request->user()) {
            return response()->json([
                "message" => "Perfil de usuario",
                "user" => $request->user()
            ], 200);
        } else {
            return response()->json([
                "message" => "No hay usuario logueado"
            ], 401);
        }
        ;
    }

    public function logout(Request $request)
    {
        $user = User::where("email", $request->email)->first();
        if ($user) {
            $user->tokens()->delete();
            return response()->json([
                "message" => "Sesión cerrada",
            ], 200);
        } else {
            return response()->json([
                "message" => "No encontrado"
            ], 401);
        }
        ;
    }


}
