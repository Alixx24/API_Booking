<?php

namespace App\Repositoreis;

use App\Models\Booking;

class BookingRepo implements BookingRepoInterface
{
    public function index()
    {
        // $bookings = Booking::where('user_id', Auth::id())->with('service')->paginate(10);

        return Booking::where('user_id', 1)->with('service')->paginate(10);
    }
}
