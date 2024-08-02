<?php

namespace App\Models;

use App\HasLog;
use App\Http\Filters\HasFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin Builder
 */
class Tag extends Model
{
    use HasFactory;
    use HasLog;
    use HasFilter;
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
