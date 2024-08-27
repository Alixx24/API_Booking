<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositoreis\TicketRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, 'https://sokanacademy.com');
    // curl_setopt($ch, CURLOPT_POST, 0);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $response = curl_exec ($ch);
    // $err = curl_error($ch);  //if you need
    // curl_close ($ch);
    // return $response;
  }

  public function answer(Request $request, $id)
  {
    $data = $request->all();

    $validator = Validator::make($data, [
      'subject' => 'required',
      'description' => 'required'
    ]);
    $this->repo->answer($id, $data);
    return response()->json('answer doned successfully', 201);
  }
}
