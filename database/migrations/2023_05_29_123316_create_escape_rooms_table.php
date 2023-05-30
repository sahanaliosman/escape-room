<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EscapeRoomTheme;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('escape_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EscapeRoomTheme::class)->index();
            $table->unsignedTinyInteger('max_participants'); // Max amount of participants
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('note')->nullable(); // Shown for any note.
            $table->text('description')->nullable(); // Game description

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
        Schema::dropIfExists('escape_rooms');
    }
};
