<?php

namespace App\Http\Resources\Comment;

use App\Http\Resources\Profile\ProfileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'content' => $this->content,
            'profile' => $this->profile,
            'commentable_type' => $this->commentable_type,
            'commentable' => $this->commentable,
            'likes' => $this->likedByProfiles()->count(),
            'created_at' => $this->created_at,
        ];
    }
}
