<?php

namespace App\Models;

use App\HasLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @mixin Builder
 */
class Role extends Model
{
    use HasFactory;
    use HasLog;
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function profiles()
    {
        return $this->hasManyThrough(Profile::class, User::class);
    }
}
