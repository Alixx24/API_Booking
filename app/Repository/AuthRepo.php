<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;

class AuthRepo implements AuthRepoInterFace{

    public function login(Request $request)
    {

        return $user = User::where('email', $request->email)->first();
    }

    public function register()
    {
        
    }
}