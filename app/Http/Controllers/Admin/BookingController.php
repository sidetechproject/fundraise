<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Place;

class BookingController extends Controller
{
    public function list()
    {
        $bookings = Booking::query()
            ->with('user')
            ->with('place')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.booking.booking_list', [
            'bookings' => $bookings
        ]);
    }

    public function updateStatus(Request $request)
    {
        $data = $this->validate($request, [
            'status' => 'required',
        ]);

        $booking = Booking::where(['id' => $request->booking_id])->with(['user', 'place'])->first();

        $booking->fill($data)->save();

        if($request->status){
            Mail::send('frontend.mail.new_booking', [
                'name' => $booking->name,
                'email' => $booking->email,
                'phone' => $booking->phone,
                'place' => $booking->place->name,
                'text_message' => $booking->message
            ], function ($message) use ($request, $booking) {
                $message->to($booking->user->email, "{$booking->name}")
                ->subject('New Investor: ' . $booking->name)
                ->replyTo($booking->email, $booking->name);
            });
        }

        return back()->with('success', 'Update status success!');
    }
}
