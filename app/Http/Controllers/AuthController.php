<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\AuthRepoInterFace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private AuthRepoInterFace $repo;

    public function __construct(AuthRepoInterFace $repo)
    {
        $this->repo = $repo;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
     
        $user = $this->repo->register($validator->validate());
        return response()->json([
            'message' => 'User succefully created',
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validate())) {
            return response()->json(['error' => 'unAutorized'], 401);
        }

        $user = $this->repo->login($request);
        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json(['token' => $token]);
    }
}
