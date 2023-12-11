<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;
use App\Models\Distric;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';


    public function advertisement(){

        return $this->belongsTo(Advertisement::class, 'id', 'country_id');
    }

    public function district()
    {
        return $this->hasMany(District::class);
    }
}
