<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table="order_details";
    public  function order()
    {
        return $this->belongsTo('app\Order','order_id','id');
    }
    public  function product()
    {
        return $this->belongsTo('app\Product','product_id','id');
    }
}
