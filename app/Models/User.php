<?php

namespace App\Models;

use App\Models\Post;
use App\Models\PostLike;
use App\Models\Forum;
use App\Models\Message;
use App\Models\Setting;
use App\Models\ForumLike;
use App\Models\Joblisting;
use App\Models\Advertisement;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'password',
        'google_id',
        'fb_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function blogs()
    {
        return $this->hasMany(Post::class, 'user_id', 'id')->latest();
    }

    public function forum()
    {
        return $this->hasMany(Forum::class, 'user_id', 'id')->latest();
    }

    public function imageUpload(){

        return $this->hasMany(ImageUpload::class, 'user_id', 'id')->latest();
    }

    public function advertisement(){

        return $this->hasMany(Advertisement::class, 'user_id', 'id')->latest();
    }

    public function jobads(){

        return $this->hasMany(Joblisting::class, 'user_id', 'id')->latest();
    }

    public function setting()
    {
        return $this->hasOne(Setting::class, 'user_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function likes(): HasMany
    {
        return $this->hasMany(ForumLike::class);
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps();
    }

    public function isFollowing(User $user)
    {
        return $this->followings->contains($user);
    }


    public function postLikes(): HasMany
    {
        return $this->hasMany(PostLike::class);
    }


}
