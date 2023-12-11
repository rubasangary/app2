<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobSubcategory;
use App\Models\Joblisting;




class JobCategory extends Model
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

    public function JobSubcategory()
    {
        return $this->hasMany(JobSubcategory::class);
    }

    public function jobs()
    {
        return $this->hasMany(Joblisting::class);
    }

}
