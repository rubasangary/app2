<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Adscategory;
use App\Models\Childcategory;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'adscategory_id',

    ];

    // it returns slugs of subcatergory to find the ads
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function adscategory()
    {
        return $this->belongsTo(Adscategory::class, 'adscategory_id', 'id');
    }


    public function childcategory()
    {
        return $this->hasMany(Childcategory::class);
    }

    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }
}
