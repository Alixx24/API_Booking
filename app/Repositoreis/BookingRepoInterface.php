<?php

namespace App\Repositoreis;

interface BookingRepoInterface {
    function index();
    function store(array $data);
}