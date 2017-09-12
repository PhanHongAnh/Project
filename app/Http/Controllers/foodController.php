<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use function Sodium\compare;

class foodController extends Controller
{
    public function food()
    {
        $sanpham_new = Product::where('new',1)->where('type',1)->paginate(10);
        $sanpham_hot = Product::where('is_hot',1)->where('type',1)->paginate(10);
        return view('page.food',['sanpham_new'=>$sanpham_new,'sanpham_hot'=>$sanpham_hot]);
    }

}
