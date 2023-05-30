<?php

namespace Database\Factories;

use App\Models\EscapeRoomTheme;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EscapeRoom>
 */
class EscapeRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'escape_room_theme_id' => EscapeRoomTheme::factory(),
            'max_participants' => rand(1,10),
            'name' => $this->faker->sentence,
            'title' => $this->faker->sentence,
            'description' => $this->faker->text(300),
            'note' => $this->faker->text(300),

            'creator_id' => User::all()->first(),
            'updater_id' => User::all()->first(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
