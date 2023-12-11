<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Forum;

class ForumLike extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'forum_id',

    ];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id', 'id');
    }

    public function likedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
