<?php

namespace App\Models;

use App\HasLog;
use App\Http\Filters\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Comment extends Model
{
    use HasFactory;
//    use HasLog;
    use HasFilter;
    public function commentable()
    {
        return $this->morphTo();
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function category()
    {
        return $this->post->category();
    }
    public function likedByProfiles()
    {
        return $this->morphToMany(Profile::class, 'likeable');
    }
}
