<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class menuController extends Controller
{
    public function menu()
    {
        $do_an = Product::where('type',1)->paginate(14);
        $do_uong= Product::where('type',0)->paginate(14);
        return view('page.menu',['do_an'=>$do_an,'do_uong'=>$do_uong]);
    }
}
