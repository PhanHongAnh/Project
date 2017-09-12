<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class drinksController extends Controller
{
    public function drinks()
    {
        $sanpham_new = Product::where('new',1)->where('type',0)->paginate(10);
        $sanpham_hot = Product::where('is_hot',1)->where('type',0)->paginate(10);
        return view('page.drinks',['sanpham_new'=>$sanpham_new,'sanpham_hot'=>$sanpham_hot]);
    }
}
