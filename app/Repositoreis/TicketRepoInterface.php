<?php

namespace App\Repositoreis;

interface TicketRepoInterface {
    function index();
    function answer($id,array $data);
}