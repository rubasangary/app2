<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
// use App\Models\PostLike;


class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [

        'user_id',
        'category_id',
        'title',
        'slug',
        'content',
        'author',
        'image',
        'url',
        'like_count',
        'share_count',
        'view_count',
        'is_featured',
        'is_published',
        'yt_iframe',
        'web_link',
        'meta_title',
        'meta_description',
        'meta_keyword',

    ];

    public function category(){

        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function postUser(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postLikes()
    {
        return $this->belongsToMany(User::class, 'post_likes', 'post_id', 'user_id')->withTimestamps();
    }


    public function isLikedByUser()
    {
        return $this->postLikes()->where('user_id', auth()->id())->exists();
    }


    public function likesCount()
    {
        return $this->postLikes()->count();
    }

    public function getLatestPosts()
    {
        $latestPosts = Post::where('is_featured', false)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return $latestPosts;
    }
}
