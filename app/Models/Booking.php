<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'escape_room_id', 'time_slot_id', 'booking_date', 'birthday_discount', 'participants'];

    /**
     * Get the booking associated with the escaperoom.
     */
    public function escapeRoom(): HasOne
    {
        return $this->hasOne(EscapeRoom::class, 'id', 'escape_room_id');
    }

    /**
     * Get the booking associated with the timeslot.
     */
    public function timeSlot(): HasOne
    {
        return $this->hasOne(TimeSlot::class, 'id', 'time_slot_id');
    }

    /**
     * Get the booking associated with the user.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
