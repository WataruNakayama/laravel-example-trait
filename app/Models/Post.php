<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Timestamp;

class Post extends Model
{
    use Timestamp;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
