<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table="rates";
    public  function person()
    {
        return $this->belongsTo('app\Persons','user_id','id');
    }
    public  function product()
    {
        return $this->belongsTo('app\Persons','product_id','id');
    }
}
