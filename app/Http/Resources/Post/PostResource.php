<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'content' => $this->content,
            'description' => $this->description,
            'image_path' => $this->image_path,
            'published_at' => $this->published_at,
            'status' => $this->status,
            'profile' => $this->profile,
            'category' => $this->category,
            'likes' => $this->likes,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
