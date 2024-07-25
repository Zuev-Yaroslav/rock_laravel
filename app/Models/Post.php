<?php

namespace App\Models;

use App\HasLog;
use App\Http\Filters\HasFilter;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
//#[observedBy(PostObserver::class)]
class Post extends Model
{
    use HasFactory;
    use HasLog;
    use HasFilter;
    protected static function booted()
    {

    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function role()
    {
        return $this->profile->role();
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function likedByProfiles()
    {
        return $this->morphToMany(Profile::class, 'likeable');
    }
}
