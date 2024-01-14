<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['email incorrect'],
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['password incorrect'],
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(
            [
                'message' => 'Login successfully',
                'jwt-token' => $token,
                'data' => new UserResource($user),
            ]
        );
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout successfully',
        ]);
    }

    public function user(Request $request)
    {
        $user = $request->user();
        return response()->json(
            [
                'message' => 'Get data user successfully',
                'data' => new UserResource($user),
            ]
        );
    }
}
