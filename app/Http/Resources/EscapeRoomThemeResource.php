<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EscapeRoomThemeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'story' => $this->story,
            'info' => $this->info,
            'puzzle_level' => $this->puzzle_level,
            'image' => $this->image,
            'video' => $this->video,
        ];
    }
}
