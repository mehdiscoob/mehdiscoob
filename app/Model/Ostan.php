<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ostan extends Model
{

//    use SoftDeletes;
    protected $fillable=['name'];


    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
