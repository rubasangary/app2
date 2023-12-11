<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    use HasFactory;

    protected $fillable = [

        'image_category_id',
        'name',
        'slug',
        'description',
        'image',
        'user_id'

    ];

    public function category(){

        return $this->belongsTo(Category::class, 'image_category_id', 'id');
    }

    public function imageSharedBy(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
