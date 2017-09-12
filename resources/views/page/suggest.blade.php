@extends('master')
@section('content')
    <div class="container" style="margin-bottom: 200px">
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
                        <li><a href="{!! route('logout') !!}">Log out </a></li>
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
                        <li class="current"><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
                        <li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
                        <li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
                        <li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
                    </ul>
                @else
                    <ul id="infos1">
                        <li><a href="{!! route('logout') !!}">Log out </a></li>
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
                        <li class="current"><a href="http://localhost:8000/drinks"><span>Suggest</span></a></li>

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
                <a href="#" id="logo"></a>
                <ul id="navigation">
                    <li class="current"><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
                    <li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
                    <li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
                    <li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
                </ul>
        @endif
        <!-- /#navigation -->
        </div> <!-- end of header -->
        <div style="border: 1px white solid"></div>
        <div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
            @if(Session::has('thongbao'))
                <span class="alert alert-success text-center" role="alert" style="width: 30%">
                    {{Session::get('thongbao')}}</span>
            @endif
        </div>
        <div class="col-md-4 col-md-offset-4" style="border: 1px solid #b6a338;color: #dca7a7;padding: 50px;margin-top: 50px">
                <form class="form-horizontal" action ={!! route('suggest') !!} method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h3 class="text-center" style="font-family: 'DynalightRegular';font-size: 40px">GỢI Ý</h3>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Tên món gợi ý</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên món gợi ý">
                    </div>

                    <button type="submit" class="btn btn-default" style="margin-top:15px;font-family: 'Arial Black'">Suggest</button>
                </form>
            </div>
    </div>
    @endsection