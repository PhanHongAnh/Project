<?php

namespace App\Http\Controllers;

use App\Persons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class personsController extends Controller
{
    public function getdanhsach()
    {
        $user = Persons::all();
        return view('admin.user.danhsach',compact('user',$user));
    }
    //them
    public function getthem()
    {
        return view('admin.user.them');
    }
    public function postthem(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email|unique:persons,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password',
                'phone'=>'required|min:10|max:11',
                'address'=>'required',
                'role'=>'required',
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
                'role.required'=>'Vui lòng chọn role',

            ]);
        $user = new Persons();
        $user->name = $req->name;
        $user->password = Hash::make($req->password);
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->role = $req->role;
        $user->sex = $req->sex;
        $user->birthday = $req->birthday;
        $user->avatar = $req->avatar;
        $user->save();
        return redirect()->back()->with('thanh_cong','Tạo tài khoản thành công');
    }
    //Sua
    public function getsua($id)
    {
        $user = Persons::find($id);
        return view('admin.user.sua',compact('user',$user));
    }
    public function postsua(Request $req,$id)
    {
        $user = Persons::find($id);
        $this->validate($req,
            [
                'email'=>'required|email',
                'name'=>'required',
                'phone'=>'required|min:10|max:11',
                'address'=>'required',
                'role'=>'required',
                'birthday'=>'required',
//                'avatar'=>'required',
            ],
            [
                'email.required'=>'Vui lòng nhập lại email',
                'email.email'=>'Email không đúng định dạng',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'phone.required'=>'Vui lòng nhập số điện thoại',
                'address.required'=>'Vui lòng nhập địa chỉ',
                'role.required'=>'Vui lòng chọn role',

            ]);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->role = $req->role;
        $user->birthday = $req->birthday;
//        $user->avatar = $req->avatar;
        $user->save();
        return redirect()->back()->with('thanh_cong','Update tài khoản thành công');
    }
    //Xoa
    public function getXoa($id)
    {
        $user = Persons::find($id);
        if ($user->role) {
            return redirect('http://localhost:8000/admin/user/danhsach')->with('thongbao', 'Admin không thể xoá');
        } else {
            $user->delete();
            return redirect('http://localhost:8000/admin/user/danhsach')->with('thongbao', 'Bạn đã xoá thành công');
        }
    }
    public function geteditprofile($id)
    {
        $user = Persons::find($id);
        return view('page.editprofile',compact('user',$user));
    }
    public function posteditprofile(Request $req,$id)
    {

        $user = Persons::find($id);
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password',
                'phone'=>'required|min:10|max:11',
                'address'=>'required',
                'sex'=>'required',
                'birthday'=>'required',
//                'avatar'=>'required',
            ],
            [
                'email.required'=>'Vui lòng nhập lại email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập lại mật khẩu',
                're_password.same'=>'Mật khẩu xác nhận không đúng',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'phone.required'=>'Vui lòng nhập số điện thoại',
                'address.required'=>'Vui lòng nhập địa chỉ',

            ]);
        $user->name = $req->name;
        $user->password = Hash::make($req->password);
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->sex = $req->sex;
        $user->birthday = $req->birthday;
//        $user->avatar = $req->avatar;
        $user->save();
        return redirect()->back()->with('thanh_cong','Update tài khoản thành công');
    }
}
