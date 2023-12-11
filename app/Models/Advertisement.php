<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Adscategory;
use App\Models\Childcategory;
use Illuminate\Support\Facades\DB;
use Cohensive\OEmbed\Facades\OEmbed;


class Advertisement extends Model
{
    use HasFactory;

        protected $fillable = [

            'user_id',
            'feature_image',
            'second_image',
            'third_image',

            'adscategory_id',
            'subcategory_id',
            'childcategory_id',

            'name',
            'slug',
            'description',
            'price',
            'price_status',
            'product_condition',

            'district',
            'location',
            'phone',
            'link',
            'published'

    ];


    public function displayVideoFromLink()
    {
        // $embed = Embed::make($this->link);
        $embed = OEmbed::get($this->link);
        if ($embed) {

        return $embed->html(['width' => 320]);
        }

    }



    // this subcategory for
    public function adscategory()
    {
        return $this->hasMany(Adscategory::class, 'id', 'adscategory_id');
    }

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'id', 'subcategory_id');
    }

    public function childcategory()
    {
        return $this->hasOne(Childcategory::class, 'id', 'childcategory_id');
    }

    // User relationship
    public function adPostedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //Save ad relationship
    public function userads()
    {
        return $this->belongsToMany(User::class);
    }

    //check if user already saved the ad
    public function didUserSavedAd()
    {
        return DB::table('advertisement_user')
            ->where('user_id', auth()->user()->id)
            ->where('advertisement_id', $this->id)
            ->first();
    }


    //check if user already complained the ad
    public function didUserComplained()
    {
        return DB::table('complains')
            ->where('user_id', auth()->user()->id)
            ->where('ad_id', $this->id)
            ->first();
    }


}
