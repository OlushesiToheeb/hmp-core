<?php

namespace App\Http\Controllers;


use App\Http\Requests\Auth\LoginRequest;
use Exception;

class AuthenticationController extends Controller
{
    public function loginUser(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            throw new Exception("Invalid login credential", 1);
        }

        return $token;
    }
}
