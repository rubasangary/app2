<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';

    protected $fillable = [

            'user_id',
            'fullname',
            'banner',
            'about',
            'address',
            'phone',
            'mobile',
            'website',
            'facebook',
            'youtube',
            'instagram',
            'pinterest',

    ];

    public function bioData(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
