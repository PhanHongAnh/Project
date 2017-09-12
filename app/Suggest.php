<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table="suggests";
    public  function person()
    {
        return $this->belongsTo('app\Persons','user_id','id');
    }
}
