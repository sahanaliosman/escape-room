<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EscapeRoomTheme>
 */
class EscapeRoomThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence;
        $title = $this->faker->sentence;
        $slug = Str::slug($title);

        return [
            'name' => $name,
            'slug' => $slug,
            'title' => $title,
            'description' => $this->faker->text(300),
            'story' => $this->faker->text(300),
            'info' => $this->faker->text(300),
            'puzzle_level' => rand(1,5),
            'image' => $this->faker->imageUrl(900, 300),
            'creator_id' => User::all()->first(),
            'updater_id' => User::all()->first(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
