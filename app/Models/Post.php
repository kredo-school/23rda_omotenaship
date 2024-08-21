<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
  
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function browsingHistories()
    {
        return $this->hasMany(BrowsingHistory::class);
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id');
    }

    public function postCategories()
    {
        return $this->hasMany(PostCategory::class);
    }

    public function isFavorited()
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }


        return $user->favorites()->where('post_id', $this->id)->exists();
    }

}
