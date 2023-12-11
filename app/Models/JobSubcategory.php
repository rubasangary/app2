<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobCategory;
use App\Models\Joblisting;

class JobSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'job_category_id',

    ];


    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function jobs()
    {
        return $this->hasMany(Joblisting::class);
    }


}
