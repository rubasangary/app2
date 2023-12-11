<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Advertisement;

class Childcategory extends Model
{
    use HasFactory;
    protected $fillable= ['name','subcategory_id','slug'];


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

       //new added
    public function ads()
    {
        return $this->hasMany(Advertisement::class);
    }



}
