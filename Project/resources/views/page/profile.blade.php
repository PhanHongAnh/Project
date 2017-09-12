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
    <div style="border-bottom: 1px solid white;margin-bottom: 20px"></div>
    <div style="color:blue">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                @foreach($person as $pr)
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thông tin cá nhân : {{$pr->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://localhost:8000/img/product/{{$pr->avatar}}" class="img-circle img-responsive"> </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        <td>{{$pr->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth:</td>
                                        <td>{{$pr->birthday}}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Giới tính:</td>
                                        <td>{{$pr->sex}}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ:</td>
                                        <td>{{$pr->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td>{{$pr->phone}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                                <a href="http://localhost:8000/editprofile/{{$pr->id}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    Sửa
                                </a>
                                <a href="http://localhost:8000/trangchu" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    Back
                                </a>
                            </span>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

    </div>
    <div style="border-bottom: 1px solid white;margin-bottom: 20px"></div>
</div>
<!-- end of contents -->
@endsection