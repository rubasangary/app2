<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\User;
use App\Models\ForumLike;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = [

        'content',
        'user_id',

    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function forumPostedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function forumLikes()
    {
        return $this->belongsToMany(User::class, 'forum_likes', 'forum_id', 'user_id')->withTimestamps();
    }

    public function isLikedByUser()
    {
        return $this->forumLikes()->where('user_id', auth()->id())->exists();
    }

    public function likesCount()
    {
        return $this->forumLikes()->count();
    }



}




