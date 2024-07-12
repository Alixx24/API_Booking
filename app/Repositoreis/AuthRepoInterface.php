<?php

namespace App\Repositoreis;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

interface AuthRepoInterface {
    function login(Request $request);
    function register(array $data);
}