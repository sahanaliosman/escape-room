<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'room_name' => $this->escapeRoom->name,
            'user_name' => $this->user->name,
            'time_range' => $this->timeSlot->begin."-".$this->timeSlot->end,
            'booking_date' => $this->booking_date,
            'participants' => $this->participants,
            'birthday_discount' => $this->birthday_discount
        ];
    }
}
