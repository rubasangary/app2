<?php

namespace App\Models;

use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complain extends Model
{
    use HasFactory;
    protected $fillable = ['ad_id', 'user_id', 'reason', 'email', 'message'];

    public function reportedAd()
    {
        return $this->belongsTo(Advertisement::class, 'ad_id', 'id');
    }



}
