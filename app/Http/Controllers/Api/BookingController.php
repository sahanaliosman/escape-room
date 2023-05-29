<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\EscapeRoom;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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



            $booking = Booking::create([
                'user_id' => $request->user()->id,
                'escape_room_id' => $request->room_id,
                'time_slot_id' => $request->time_slot_id,
                'booking_date' => Carbon::createFromFormat('d/m/Y',  $request->booking_date),
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json(null, 204);
    }
}
