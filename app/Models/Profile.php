<?php

namespace App\Models;

use App\HasLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 *
 *
 * @property int $id
 * @property int|null $gender
 * @property string|null $birthed_at
 * @property string|null $avatar_path
 * @property bool $is_active
 * @property string|null $first_name
 * @property string|null $second_name
 * @property string|null $third_name
 * @property string $login
 * @property int $user_id
 * @property int $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read int|null $posts_count
 * @property-read \App\Models\Role $role
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBirthedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereThirdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @method static \Database\Factories\ProfileFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
class Profile extends Model
{
    use HasFactory;
    use HasLog;
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
    public function profileable()
    {
        return $this->morphTo();
    }
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
    public function role()
    {
        return $this->user->role();
    }
}
