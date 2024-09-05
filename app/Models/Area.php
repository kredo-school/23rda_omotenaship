<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected  $fillable = ['area_id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
