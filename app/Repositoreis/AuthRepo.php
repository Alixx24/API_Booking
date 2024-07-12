<?php

namespace App\Repositoreis;

use App\Models\User;
use Illuminate\Http\Request;

class AuthRepo implements AuthRepoInterface
{

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        return $user->createToken('auth-token')->plainTextToken;
    }
}
