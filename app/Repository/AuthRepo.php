<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthRepo implements AuthRepoInterFace
{

    public function login(Request $request)
    {
        return $user = User::where('email', $request->email)->first();
    }

    public function register($validator)
    {
        return User::create([
            'name' => $validator['name'],
            'email' => $validator['email'],
            'password' => bcrypt($validator['password'])
        ]);
    }
}
