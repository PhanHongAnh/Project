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
                    <li class="current"><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
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
                    <li class="current"><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
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
            <a href="#" id="logo"></a>
            <ul id="navigation">
                <li class="current"><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
                <li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
                <li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
                <li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
            </ul>
    @endif<!-- /#navigation -->
    </div>  <!-- end of header -->
    @if(Session::has('cart'))
    <div class="container" style="margin-bottom: 140px"> <!--Content-->
       <table class="table table-bordered text-center" >
           <tr>
               <td>Tên Sản Phẩm</td>
               <td>Số Lượng</td>
               <td>Giá/Sản phẩm</td>
               <td>Tổng Tiền</td>
               <td>Delete</td>
           </tr>

           @foreach($product_cart as $product)
           <tr>
               <td>{{$product['item']['name']}}</td>
               <td>{{$product['qty']}}</td>
               <td>${{$product['item']['price']}}</td>
               <td>{{$product['price']}}</td>
               <td><a href="{{route('delcart',$product['item']['id'])}}">Delete</a></td>
           </tr>
           @endforeach
       </table>
        <div><b>TỔNG SỐ LƯỢNG SẢN PHẨM : {{Session('cart')->totalQty}}</b></div>
        <div><b>TỔNG TIỀN : $ {{Session('cart')->totalPrice}} </b></div>
        <a href="http://localhost:8000/dat_hang"><input type="submit" value = "Đặt Hàng" style="color: black;float: right"></a>
    </div>
    @else
        <div class="container">
        {{--<div class="text-center" style="font-size: 30px ; margin-bottom: 200px"> </div>--}}
        <div class="alert alert-warning text-center" role="alert" style="font-size: 30px ; margin-bottom: 200px">Giỏ hàng trống</div>
        </div>
    @endif
@endsection