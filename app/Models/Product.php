<?php

namespace App\Models;

use App\HasLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;
//    use HasLog;
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
