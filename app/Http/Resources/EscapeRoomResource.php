<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EscapeRoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'note' => $this->note,
            'max_participants' => $this->max_participants,
            'theme' => $this->theme()
        ];
    }

    public function theme(): array
    {
        return [
            'name' => $this->theme->name,
            'slug' => $this->theme->slug,
            'title' => $this->theme->title,
            'description' => $this->theme->description,
            'story' => $this->theme->story,
            'info' => $this->theme->info,
            'puzzle_level' => $this->theme->puzzle_level,
            'image' => $this->theme->image,
            'video' => $this->theme->video
        ];
    }

}
