<?php

namespace App\Repositoreis;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthRepo implements AuthRepoInterface
{

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        return $user->createToken('auth-token')->plainTextToken;
    }
  
    public function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
