<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface AuthRepoInterFace
{
    function login(Request $request);
    function register($validator);
}
