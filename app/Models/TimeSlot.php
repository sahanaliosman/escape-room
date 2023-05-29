<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TimeSlot extends Model
{
    use HasFactory;

    public function escapeRoom(): HasOne
    {
        return $this->hasOne(EscapeRoom::class, 'id', 'escape_room_id');
    }
}
