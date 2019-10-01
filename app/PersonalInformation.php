<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    //
    protected $guarded = [];
    function benefits(){

        return $this->belongsToMany(Benefit::class)->withTimestamps();
    }
}
