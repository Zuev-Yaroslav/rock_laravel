<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @mixin Builder
 */
class Video extends Model
{
    use HasFactory;

    public function likedByProfiles()
    {
        return $this->morphToMany(Profile::class, 'likeable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function getLikesAttribute() : int
    {
        return $this->likedByProfiles()->count();
    }
}
