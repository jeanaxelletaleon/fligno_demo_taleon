<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    //
    protected $guarded = [];
    function personal_information(){

        return $this->belongsToMany(PersonalInformation::class)->withTimestamps();
    }
}
