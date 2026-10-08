<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'], 
            'password' => ['required', 'string'],
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas.',
            ], 401);
        }

        $token = $user->createToken('AzorSuite')->plainTextToken;

        return response()->json([
            'message' => 'Login correcto.', 
            'token' => $token, 
            'user' => [
                'id' => $user->id, 
                'name' => $user->name, 
                'surname' => $user->surname, 
                'username' => $user->username, 
                'email' => $user->email, 
                'phone' => $user->phone,
                'role' => $user->isAdmin ? 'admin' : 'user',
            ],
        ]);
    }
}
