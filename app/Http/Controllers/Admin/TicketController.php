<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositoreis\TicketRepoInterface;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private TicketRepoInterface $repo;
    public function __construct(TicketRepoInterFace $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
      $fetchTickets = $this->repo->index();
      return response()->json($fetchTickets);
    }
}
