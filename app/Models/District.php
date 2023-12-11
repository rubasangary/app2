<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;


class District extends Model
{
    use HasFactory;
    protected $table = 'districts';


    public function country()
    {
        return $this->belongsTo(Country::class, 'id', 'district_id');
    }

    public function advertisement(){

        return $this->belongsTo(Advertisement::class, 'id', 'district_id');
    }
}
