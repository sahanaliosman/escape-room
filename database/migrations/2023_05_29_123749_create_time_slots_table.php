<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\EscapeRoom;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EscapeRoom::class)->index();
            $table->unsignedTinyInteger('participants'); // Booked amount for participants
            $table->time('begin'); // Slot begin time
            $table->time('end'); // Slot end time
            $table->tinyInteger('slot_number'); // Time range number(9:00-12::00 -> 1, 12:00-15:00 -> 2...)

            $table->foreignIdFor(User::class, 'creator_id');
            $table->foreignIdFor(User::class, 'updater_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_slots');
    }
};
