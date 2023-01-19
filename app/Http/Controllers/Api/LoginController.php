<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        if ($token = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return response()->json([
                'success' => true,
                'message' => 'login success',
                'access_token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'unauthenticated',
            ], 401);
        }
    }
}
