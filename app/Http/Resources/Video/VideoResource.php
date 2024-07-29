<?php

namespace App\Http\Resources\Video;

use App\Http\Resources\Profile\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'video_path' => $this->video_path,
            'thumbnail_path' => $this->thumbnail_path,
            'description' => $this->description,
            'profile' => ProfileResource::make($this->profile),
            'likes' => $this->likes,
            'created_at' => $this->created_at,
        ];
    }
}
