<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="orders";
    public  function person()
    {
        return $this->belongsTo('app\Persons','user_id','id');
    }
    public  function order_detail()
    {
        return $this->hasMany('app\Order_detail','order_id','id');
    }
}
