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
        return $this->hasMany(Comment::class,'post_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLiked(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class,'favorites');
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

    public function isFavorited(User $user)
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'post_category','post_id','category_id');
    }

}
