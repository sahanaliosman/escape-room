<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EscapeRoom extends Model
{
    use HasFactory;

    /**
     * Get the theme associated with the escaperoom.
     */
    public function theme(): HasOne
    {
        return $this->hasOne(EscapeRoomTheme::class, 'id', 'escape_room_theme_id');
    }

    /**
     * Get the time_slots associated with the escaperoom.
     */
    public function timeSlots(): HasMany
    {
        return $this->hasMany(TimeSlot::class);
    }
}
