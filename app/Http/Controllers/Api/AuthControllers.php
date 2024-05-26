<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthControllers extends Controller
{
    public function login(Request $request)
    {

//        validate request existing email
        $valid = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required|string'
        ]);
        // eror handling $valid
        if (!$valid) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $valid
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        // eror handling $user
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => 'The provided credentials are incorrect.'
                ]
            ], 422);
        }

        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json([
            'message' => 'success',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);

    }

    public function logout(Request $request)
    {

//  check Auth:check
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'message' => 'Unauthenticated'
        ], 401);
    }

//    make register function
    public function register(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Buat token otentikasi
        $token = $user->createToken('token-name')->plainTextToken;

        // Kembalikan respons JSON
        return response()->json([
            'message' => 'success',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ], 201);
    }

}
