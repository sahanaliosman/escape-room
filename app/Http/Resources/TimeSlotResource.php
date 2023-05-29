<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimeSlotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'participants' => $this->participants,
            'begin' => $this->begin,
            'end' => $this->end,
            'slot_number' => $this->slot_number
        ];
    }
}
