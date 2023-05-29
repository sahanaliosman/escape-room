<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('escape_room_themes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->index();
            $table->string('title')->unique();
            $table->text('description')->nullable();
            $table->text('story')->nullable();
            $table->text('info')->nullable(); // Additional information about escape rooms with this theme. Used for note to display on frontend of website
            $table->unsignedTinyInteger('puzzle_level')->nullable(); // 1-5 scale
            $table->string('image')->nullable();
            $table->string('video')->nullable();

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
        Schema::dropIfExists('escape_room_themes');
    }
};
