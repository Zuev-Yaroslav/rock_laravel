<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\HasLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


/**
 * @mixin Builder
 */
class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
//    use HasLog;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function getIsAdminAttribute(): bool
    {
        if ($this->roles->contains('name', 'admin')) {
            return true;
        }
        return false;
    }
    private function getIsSomeModerator(string $entity) : bool
    {
        if ($this->roles->contains('name', $entity . '_moderator')) {
            return true;
        }
        return false;
    }
    public function getIsSomePermission(string $permission) : bool
    {
        if ($this->permissions->contains('name', $permission)) {
            return true;
        }
        return false;
    }
    public function getIsPostModeratorAttribute()
    {
        return $this->getIsSomeModerator('post');
    }
    public function getIsProductModeratorAttribute(): bool
    {
        return $this->getIsSomeModerator('product');
    }
    public function getIsVideoModeratorAttribute(): bool
    {
        return $this->getIsSomeModerator('video');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
