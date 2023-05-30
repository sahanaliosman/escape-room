<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\EscapeRoom;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingResource::collection(Booking::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingStoreRequest $request)
    {
        try {
            $timeSlot = TimeSlot::find($request->time_slot_id);
            $escapeRoom = EscapeRoom::find($request->room_id);
            $booking_datetime = $request->booking_date." ".$timeSlot->begin.":00";

            if(!$this->isTimeSlotAvailable($escapeRoom, $timeSlot, $booking_datetime, $request->participants)){
                throw new \Exception('This slot is not available for '.$booking_datetime);
            }

            $booking = Booking::create([
                'user_id' => $request->user()->id,
                'escape_room_id' => $request->room_id,
                'time_slot_id' => $request->time_slot_id,
                'booking_date' => Carbon::createFromFormat('Y-m-d H:i:s', $booking_datetime),
                'participants' => $request->participants,
                'birthday_discount' => ($this->isBirthday($booking_datetime) ? 10 : 0),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Booking Created Successfully',
                'details' => BookingResource::collection([$booking])
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Throwable
     */
    public function destroy(Booking $booking)
    {
        if ($booking->deleteOrFail() === false) {
            return response()->json(['message'=>'Delete Failed']);
        }

        return response()->json(['message'=>'Successfully Deleted']);
    }

    private function isTimeSlotAvailable($escapeRoom, $timeSlot, $booking_datetime, $participants){

        $booked_participants = Booking::where('booking_date', $booking_datetime)
                                        ->where('time_slot_id', $timeSlot->id)->sum('participants');

        $available_participants = $escapeRoom->max_participants - $booked_participants;

        return $available_participants >= $participants;
    }

    private function isBirthday($booking_datetime){
        return Carbon::parse(Auth::user()->birthdate)->format('m-d') == Carbon::parse($booking_datetime)->format('m-d');
    }
}
