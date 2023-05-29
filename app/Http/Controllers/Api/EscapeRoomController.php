<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EscapeRoomResource;
use App\Http\Resources\TimeSlotResource;
use App\Models\EscapeRoom;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EscapeRoom $escapeRoom): EscapeRoomResource
    {
        return new EscapeRoomResource($escapeRoom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EscapeRoom $escapeRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EscapeRoom $escapeRoom)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function timeSlots(EscapeRoom $escapeRoom)
    {
        return TimeSlotResource::collection($escapeRoom->timeSlots);
    }

}
