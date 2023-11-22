<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    /**
     * Authenticates the user and generates a new token.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100',
        ]);

        if (!auth()->attempt($attributes)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        return response()->json([
            'message' => 'Successfully logged in',
            'token' => $request->user()->createToken($request->get('email'))->plainTextToken
        ]);
    }

    /**
     * Registers a new user and generates a new token.
     */
    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|max:100',
        ]);

        $user = User::create($attributes);

        return response()->json([
            'message' => 'Successfully registered',
            'token' => $user->createToken($request->get('email'))->plainTextToken
        ]);
    }

    /**
     * Destroys the token for the authenticated user.
     */
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
