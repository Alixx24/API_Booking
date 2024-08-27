<?php

namespace App\Repositoreis;

use App\Models\Ticket;
use App\Models\TicketAdmin;

class TicketRepo implements TicketRepoInterface{
    public function index()
    {
        return Ticket::select('id','user_id','subject','description')->get();
    }
    public function answer($id, array $data)
    {
        $answer = new TicketAdmin();
        $answer->user_id = 4;
        $answer->ticket_id = $id;
        $answer->subject = $data['subject'];
        $answer->description = $data['description'];
        $answer->save();
    }
}