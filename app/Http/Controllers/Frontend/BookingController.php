<?php

namespace App\Http\Controllers\Frontend;


use App\Commons\Response;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Place;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function booking(Request $request)
    {
        $request['user_id'] = Auth::id();

        if ($request->date) {
            $request['date'] = Carbon::parse($request->date);
        }

        $data = $this->validate($request, [
            'user_id' => '',
            'place_id' => '',
            'name' => '',
            'email' => '',
            'phone_number' => '',
            'message' => '',
            'type' => ''
        ]);

        $booking = new Booking();
        $booking->fill($data);

        if ($booking->save()) {
            $place = Place::find($request['place_id']);

            Log::debug("Booking::TYPE_CONTACT_FORM: " . $request->type);
            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone_number;
            $text_message = $request->message;

            Mail::send('frontend.mail.new_booking', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'place' => $place->name,
                'text_message' => $text_message
            ], function ($message) use ($request, $name) {
                $message->to(setting('email_system'), "{$name}")->subject('New Investor: ' . $name);
            });

        }

        return $this->response->formatResponse(200, $booking, 'You successfully created your booking!');
    }
}
