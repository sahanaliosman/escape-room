<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EscapeRoom;
use App\Models\User;
use App\Models\TimeSlot;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EscapeRoom::class)->index();
            $table->foreignIdFor(User::class)->index();
            $table->foreignIdFor(TimeSlot::class)->index();
            $table->dateTime('booking_date');
            $table->tinyInteger('birthday_discount')->nullable();
            $table->unsignedTinyInteger('participants');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
