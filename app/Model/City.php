<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
//    use SoftDeletes;
    public function ostan()
    {
        return $this->belongsTo(Ostan::class);
    }

    public function seminaraddrs()
    {
        return $this->hasMany(SeminarAddr::class);
   }


    public function semats()
    {
        return $this->hasMany(Semat::class);
    }

}
