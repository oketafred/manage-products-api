<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Add Validation Here
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('admin')->accessToken;
            return [
                'token' => $token
            ];
        }

        return response()->json(['error' => 'Invalid Credentials'], Response::HTTP_UNAUTHORIZED);
    }
}
