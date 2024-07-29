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
class Category extends Model
{
    use HasFactory;
//    use HasLog;
    use HasFilter;
    protected static function booted(): void
    {

    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasManyThrough(Comment::class, Post::class, 'category_id', 'commentable_id', 'id', 'id');
    }
}
