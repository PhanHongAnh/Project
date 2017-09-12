<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Persons;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class myController extends Controller
{
    public function profile(Request $request)
    {
        $person = Persons::where('id',$request->id)->get();
        return view('page.profile',compact('person',$person));
    }
    public function history(Request $request)
    {
        $order = Order::where('id','>',0)->paginate(15);
        return view('page.history',compact('order',$order));
    }
    public function getSignin()
    {
        if(Auth::check())
            return view('page.trangchu');
        else
            return view('page.signin');
    }
    public function postsignin(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Vui lòng nhập lại email',
                'email.email'=>'Email không đúng định dạng',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu nhiều nhất 20 ký tự',
            ]);
//        $person = Persons::where('email',$req->email)->where('password',$req->password)->first();
//        if($person != NULL)
//        {
//            return view('page.trangchu',compact('person',$person));
//        }
//        else
//        {
//            return redirect()->back()->with('thongbao',"Đăng Nhập Thất Bại");
//        }
////        echo $req->email;
////        echo $req->password;
//        $person = Persons::where('email',$req->email)->where('password',$req->password)->first();
//        view()->share('person',$person);
//        if($person)
//        {
//            return view('page.trangchu');
//        }
//        else
//             return redirect()->back()->with('thongbao', "Đăng Nhập Không Thành Công -Vui Lòng Kiểm Tra Lại Email Và Password");
        //dd($req->email . '-' . $req->password);

        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])) {
            return redirect('http://localhost:8000/trangchu');
        } else {
            return redirect()->back()->with('thongbao', "Đăng Nhập Không Thành Công -Vui Lòng Kiểm Tra Lại Email Và Password");
        }
    }
    public function getsignup()
    {
        if(Auth::check())
            return view('page.trangchu');
        else
            return view('page.signup');
    }
    public function postSignup(Request $req)
    {

        $this->validate($req,
            [
                'email'=>'required|email|unique:persons,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password',
                'phone'=>'required|min:10|max:11',
                'address'=>'required',
                'sex'=>'required',
                'birthday'=>'required',
                'avatar'=>'required',
            ],
            [
                'email.required'=>'Vui lòng nhập lại email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã được sử dụng',
                'password.required'=>'Vui lòng nhập lại mật khẩu',
                're_password.same'=>'Mật khẩu xác nhận không đúng',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'phone.required'=>'Vui lòng nhập số điện thoại',
                'address.required'=>'Vui lòng nhập địa chỉ',
            ]);
        $user = new Persons();
        $user->name = $req->name;
        $user->password = Hash::make($req->password);
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->avatar = $req->avatar;
        $user->sex = $req->sex;
        $user->birthday = $req->birthday;
        $user->save();
//        $data = $req->only('name', 'password', 'email','phone');
//        $user = User::create($data);
        return redirect()->back()->with('thanh_cong','Tạo tài khoản thành công');
    }

    public function search(Request $request)
    {
        $product = Product::where('name','like','%'.$request->ten_sp.'%')
                            ->orWhere('price',$request->ten_sp)
                            ->paginate(14);
        return view('page.search',compact('product'));

    }

    public function  logout()
    {
        if(Session::has('cart')){
            Session::forget('cart');
        }
        Auth::logout();
        return redirect()->route('trangchu');
    }

}
