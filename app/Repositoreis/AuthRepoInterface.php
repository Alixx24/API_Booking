<?php

namespace App\Repositoreis;

use Illuminate\Http\Request;

interface AuthRepoInterface {
    function login(Request $request);
}