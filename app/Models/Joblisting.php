<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JobCategory;
use App\Models\JobSubcategory;

class Joblisting extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'company_name',
        'logo',
        'job_category_id',
        'job_subcategory_id',

        'name',
        'slug',
        'description',
        'qualification',
        'requirement',
        'salary',

        'district',
        'address',
        'phone',
        'email_status',
        'published'

];


public function jobPostedBy(){

    return $this->belongsTo(User::class, 'user_id', 'id');
}

public function jobcategories()
{
    return $this->belongsTo(JobCategory::class, 'id', 'job_category_id' );
}

public function jobsubcategories()
{
    return $this->belongsTo(JobSubcategory::class, 'id', 'job_subcategory_id' );
}


}
