<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
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

    // public function getAuthIdentifierName()
    // {
    //     // return 'username';
    //     // return 'name';

    //     return 'email';
    // }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ngWords()
    {
        return $this->hasMany(NGWord::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function favorites()
    {
        // return $this->hasMany(Favorite::class);
        return $this->belongsToMany(Post::class, 'favorites')->withTimestamps();
    }

    public function browsingHistories()
    {
        return $this->hasMany(BrowsingHistory::class);
    }

    public function sentDMs()
    {
        return $this->hasMany(DirectMessage::class, 'from_id');
    }

    public function receivedDMs()
    {
        return $this->hasMany(DirectMessage::class, 'to_id');
    }

    public function getAvatarAttribute()
    {
        return $this->profile->avatar;
    }


    public function getNameAttribute()
    {
        return $this->profile->first_name . ' ' . $this->profile->last_name;
    }



}
