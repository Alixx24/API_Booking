<?php

namespace App\Repositoreis;

use App\Models\Ticket;

class TicketRepo implements TicketRepoInterface{
    public function index()
    {
        return Ticket::select('user_id','subject','description')->get();
    }
}