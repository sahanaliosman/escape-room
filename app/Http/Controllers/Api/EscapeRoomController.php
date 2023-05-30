<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EscapeRoomResource;
use App\Http\Resources\TimeSlotResource;
use App\Models\EscapeRoom;

class EscapeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EscapeRoomResource::collection(EscapeRoom::paginate(25));
    }

    /**
     * Display the specified resource.
     */
    public function show(EscapeRoom $escapeRoom): EscapeRoomResource
    {
        return new EscapeRoomResource($escapeRoom);
    }

    /**
     * Display the specified resource.
     */
    public function timeSlots(EscapeRoom $escapeRoom)
    {
        return TimeSlotResource::collection($escapeRoom->timeSlots);
    }

}
