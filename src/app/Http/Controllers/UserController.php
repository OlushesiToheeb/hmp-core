<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUserRole($user)
    {
        return  $user->getRoleNames()->first();
    }
}
