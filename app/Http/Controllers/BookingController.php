<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Repositoreis\BookingRepoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    private BookingRepoInterface $repo;
    public function __construct(BookingRepoInterface $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
        $bookings = $this->repo->index();
        return response()->json($bookings);
    }

    public function store(Request $request) {
        $data = $request->all(); 

        $validator = Validator::make($data, [
            'service_id' => 'required',
            'time' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $this->repo->store($data);

        return response()->json('Booking is added', 201);
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json('Service is deleted');
    }
}
