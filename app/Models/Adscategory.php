<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Adscategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',

    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function adscategory()
    {
        return $this->hasMany(Subcategory::class);
    }
}
