<?php

namespace App\Http\Controllers;

use App\Order;
use App\Persons;
use Illuminate\Http\Request;
use App\Cart;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Order_detail;

class orderController extends Controller
{
    public function getdanhsach()
    {
        $product = Order::all();
        return view('admin.order.danhsach',compact('product',$product));
    }
    public function getXoa($id)
    {
        $or_detail = Order_detail::where('order_id',$id)->get();
        foreach ($or_detail as $or)
        {
           $deleteProduct = Order_detail::find($or->id);
           $deleteProduct->delete();
        }
        $order = Order::find($id);
        if($order->status)
        {
            $order->delete();
            return redirect('http://localhost:8000/admin/order/danhsach')->with('thongbao','Bạn đã xoá thành công');
        }
        else
        {
            return redirect('http://localhost:8000/admin/order/danhsach')->with('thongbao','Đơn hàng chưa giao không thể xoá');
        }
    }
    public function getorder()
    {
        return view('page.booking');
    }
    public function postorder(Request $request)
    {
        if(Session::has('cart'))
        {
            $cart = Session::get('cart');
            $bill = new Order;
            $bill->user_id = Auth::user()->id;
            $bill->order_time = date('Y-m-d');
            $bill->total_price = $cart->totalPrice;
            $bill->status = 0;
            $bill->save();
            foreach ($cart->items as $key =>$value) {
                $bill_detail = new Order_detail;
                $bill_detail->order_id = $bill->id;
                $bill_detail->product_id = $key;
                $bill_detail->amount = $value['qty'];
                $bill_detail->price = $value['price']/$value['qty'];
                $bill_detail->save();
            }
            $user = Persons::find(Auth::user()->id);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();

            Session::forget('cart');
//            return redirect()->back()->with('thong_bao','Đặt hàng thành công');
            return redirect('http://localhost:8000/send')->with('thong_bao','Đặt hàng thành công');
        }
        else
        {
            return redirect()->back()->with('thong_bao','Giỏ hàng trống');
        }
    }
    public function getsua($id)
    {
        $order = Order::find($id);
        return view('admin.order.sua',['order'=>$order]);
    }
    public function postsua(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('thongbao','Sửa Order thành công');
    }
}
