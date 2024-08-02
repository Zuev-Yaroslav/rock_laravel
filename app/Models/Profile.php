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
class Profile extends Model
{
    use HasFactory;
    use HasLog;
    use HasFilter;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//    public function profileable()
//    {
//        return $this->morphTo();
//    }
    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likeable');
    }
    public function likedComments()
    {
        return $this->morphedByMany(Comment::class, 'likeable');
    }
    public function likedProducts()
    {
        return $this->morphedByMany(Product::class, 'likeable');
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function roles()
    {
        return $this->user->roles();
    }
}
