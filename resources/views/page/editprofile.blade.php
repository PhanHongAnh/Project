@extends('master')
@section('content')
<div id="header"> <!-- start of header -->
    <span class="signboard"></span>
    <ul id="infos">
        <li class="home">
            <a href="#">HOME</a>
        </li>
        <li class="phone">
            <a href="http://localhost:8000/contact">04 000 111 999</a>
        </li>
        <li class="address">
            <a href="http://localhost:8000/contact">nguyenvantrung2015@gmail.com</a>
        </li>
    </ul>
    @if(Auth::check())
    @if(Auth::user()->role)
    <ul id="infos1">
        <li><a href="{{route('logout')}}">Log out </a></li>
        <li>
            {{--<a href="http://localhost:8000/profile">--}}
                {{--Chào Admin {{Auth::user()->name}}--}}
                {{--</a>--}}
            <div class="dropdown">
                <div style="margin-top: 5px" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Chào Admin {{Auth::user()->name}}
                    <span class="caret"></span>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="background: blue">
                    <li><a href="http://localhost:8000/profile/{{Auth::user()->id}}" >Thông tin admin</a></li>
                    <li><a href="http://localhost:8000/admin/user/danhsach">Quản lý</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <a href="#" id="logo"></a>
    <ul id="navigation">
        <li ><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
        <li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
        <li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
        <li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
    </ul>
    @else
    <ul id="infos1">
        <li><a href="{{route('logout')}}">Log out </a></li>
        <li><a href="http://localhost:8000/profile/{{Auth::user()->id}}">
                Chào Bạn {{Auth::user()->name}}
            </a>
        </li>
        <li><a href="http://localhost:8000/history">
                History
            </a>
        </li>
    </ul>
    <a href="#" id="logo"></a>
    <ul id="navigation">
        <li ><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
        <li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
        <li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
        <li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
        <li><a href="http://localhost:8000/drinks"><span>Suggest</span></a></li>
    </ul>
    <div class="text-right" >
        <a href="http://localhost:8000/giohang" style="font-size: 18px;text-decoration: none;font-family: fantasy">Giỏ Hàng</a>
    </div>
    @endif
    @else
    <ul id="infos1">
        <li><a href="http://localhost:8000/signup">Sign up</a></li>
        <li><a href="http://localhost:8000/signin">Sign in</a></li>
    </ul>
    @endif <!-- /#navigation -->
</div>
<!-- end of header -->
<div class="container">
    {{--<div style="border-bottom: 1px solid white;margin-bottom: 20px"></div>--}}
    <div style="border-bottom: 1px solid white;margin-bottom: 20px"></div>
    <div class="row">
        <div class="col-lg-4 col-md-offset-2 ">
            @if(count($errors)>0)<br>
            @foreach($errors->all() as $err)
                <div class="alert alert-warning text-center" role="alert">{{$err}}</div>
            @endforeach
            @endif
            @if(Session::has('thanh_cong'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('thanh_cong')}}
                </div>
            @endif
        </div>
        <div class="col-lg-7 col-md-offset-2" style="padding-bottom:120px">
            <form action="http://localhost:8000/editprofile/{{$user->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="Nhập tên " value="{{$user->name}}" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" placeholder="Nhập Email" value="{{$user->email}}" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Nhập password" value="" />
                </div>
                <div class="form-group">
                    <label>Re Password</label>
                    <input class="form-control" name="re_password" type="password" placeholder="Nhập lại password" value="" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{$user->address}}"  />
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" name="phone" placeholder="Nhập địa chỉ" value="{{$user->phone}}"  />
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio"  name="sex" value="Boy"> Boy
                        </label>
                        <label class="radio-inline">
                            <input type="radio"  name="sex" value="Girl"> Girl
                        </label>
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label>Birthday</label>
                    <input class="form-control" name="birthday" type="date" placeholder="Nhập địa chỉ" value="{{$user->birthday}}"/>
                </div>
                {{--<div class="form-group">--}}
                {{--<label>Avatar</label>--}}
                {{--<input class="form-control" name="avatar" placeholder="Nhập địa chỉ" value="{{$user->avatar}}"  />--}}
                {{--</div>--}}
                <button type="submit" class="btn btn-default">Sửa</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
    </div>
    <div style="border-bottom: 1px solid white;margin-bottom: 20px"></div>
</div>
<!-- end of contents -->
@endsection