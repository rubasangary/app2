<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class PostLike extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'post_id',

    ];


    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function PostLikedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
