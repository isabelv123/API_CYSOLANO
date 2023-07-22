<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //crear usuario
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);
        return response()->json([
            "message" => "Usuario creado correctamente"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       

    }
    
    public function login(Request $request)
    {
        //Validar datos
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        //Verificar credenciales
        if (!auth()->attempt($request->only("email", "password"))) {
            return response()->json([
                "message" => "Credenciales incorrectas"
            ], 401);
        }
        //Enviar mensaje de exito
        return response()->json([
            "message" => "Login correcto",
        ], 201);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
