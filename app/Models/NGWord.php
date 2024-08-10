<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NGWord extends Model
{
    use HasFactory;

    protected $table = 'ng_words';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ngwordPosts() {
        return $this->hasMany(NGWord::class);
    }
}

