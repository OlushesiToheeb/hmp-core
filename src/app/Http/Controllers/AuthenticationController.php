<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthenticationController extends Controller
{
    public function loginUser(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');


        if (!$token = auth()->attempt($credentials)) {
            return $this->errorResponder(null, 401, 'invalid login credentials');
        }

        $user = User::find(Auth::user()->id);
        $data = [
            'status' => 'success',
            'user' => $user,
            "role" => (new UserController())->getUserRole($user),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
            ]
        ];
        return response()->json($data, 200);
    }


    public function registerUser(RegisterRequest $request)
    {
        try {
            $payload = $request->all();

            $user = User::create([
                'first_name' => $payload['first_name'],
                'last_name' => $payload['last_name'],
                'email' => $payload['email'],
                'phone' => $payload['phone'],
                'password' => bcrypt($payload['password']),
            ])->assignRole($payload['user_type'])->sendEmailVerificationNotification();

            return $this->successResponder($user, 200, 'Registration Successful');
        } catch (\Exception $e) {
            return $this->errorResponder([], 400, $e->getMessage());
        }
    }
}
