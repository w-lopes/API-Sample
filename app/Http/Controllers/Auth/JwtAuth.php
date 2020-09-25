<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth as JWT;

class JwtAuth extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email"    => "required|email",
            "password" => "required|string",
        ]);

        $jwt_token = null;

        if (!$jwt_token = JWT::attempt($validator->validated())) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function getUser(Request $request)
    {
        return response()->json(Auth::user());
    }
}
