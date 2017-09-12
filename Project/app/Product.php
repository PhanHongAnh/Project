<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    public  function Rate()
    {
        return $this->hasMany('App\Rate','product_id','id');
    }
    public  function Comment()
    {
        return $this->hasMany('App\Comment','product_id','id');
    }

}
