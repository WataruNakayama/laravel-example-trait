<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Timestamp;

class Comment extends Model
{
    use Timestamp;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
