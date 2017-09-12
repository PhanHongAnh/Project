@extends('master')
@section('script')
    <script>
        $(function(){
            //Số lượng từ giới hạn
            var limitW = 400;
            //Số ký tự của từ
            var char = 4;
            var txt = $('p').html();
            var txtStart = txt.slice(0,limitW).replace(/\w+$/,'');
            var txtEnd = txt.slice(txtStart.length);
            if ( txtEnd.replace(/\s+$/,'').split(' ').length > char ) {
                $('p').html([
                        txtStart,
                        '<a href="#" class="more">  ...</a>',
                        '<span class="detail">',
                        txtEnd,
                        '</span>'
                    ].join('')
                );
            }

            $('span.detail').hide();
            $('a.more').click(function() {
                $(this).hide().next('span.detail').fadeIn();
                return false;
            });
        });
    </script>
@endsection
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
                <li><a href="http://localhost:8000/suggest"><span>Suggest</span></a></li>
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
            <li ><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
            <li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
            <li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
            <li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
        </ul>
    @endif
    {{--<a href="#" id="logo"></a>--}}
    {{--<ul id="navigation">--}}
        {{--<li ><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>--}}
        {{--<li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>--}}
        {{--<li ><a href="http://localhost:8000/food"><span>Food</span></a></li>--}}
        {{--<li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>--}}
    {{--</ul>--}}
    {{--<!--Giỏ Hàng-->--}}
    {{--<div class="text-right" >--}}
        {{--<a href="http://localhost:8000/giohang" style="font-size: 18px;text-decoration: none;font-family: fantasy">Giỏ Hàng</a>--}}
    {{--</div>--}}
    <!-- /#navigation -->
</div>  <!-- end of header -->

<div class="container" style="margin-bottom: 40px;border-top:1px solid white;">
    <div class="row " style="margin: 20px">
        <div class="col-xs-12 col-sm-12 col-md-5"><img src="http://localhost:8000/img/{{$sanpham->avatar}}" alt="" style="width: 374px;height:280px "></div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div style="padding-left: 20px">
                <h3 style="margin-top: 0;font-weight: 700">{{$sanpham->name}}</h3>
                <p style="margin-bottom: 15px">{{$sanpham->discrible}}</p>
                <strong>Nhãn Hiệu : </strong><br>
                <strong>Tình Trạng : </strong><!--Con hang hay het hang-->
                @if($sanpham->status == 1)
                Còn hàng
                @else
                    Sản phẩm đã hết
                @endif
                <div style="padding-top: 15px">
                            <span class="price " style="font-size: 25px">
                                <span>${{$sanpham->price}}</span>
                            </span>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="#">Số lượng</label>--}}
                    {{--<input type="number" value="1" min="1" style="width: 50px;text-align: center ;color: black">--}}
                {{--</div>--}}
                <div class="rating text-left" style="font-size: 35px;width: 200px;color: yellow">
                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                </div>
            </div>
            @if($sanpham->status)
                <div class="text-center"><a href="{{route('addcart',$sanpham->id)}}" class="btn btn-default" style="border-radius: 5px;background:#f8694d;color: white;border: none">Thêm vào giỏ hàng</a></div>
            @endif
        </div>
    </div>
    <div >
        <ul class="nav nav-tabs">
            <li class="active"><a href="#idTab1" data-toggle="tab" role="tab">THÔNG TIN CHI TIẾT</a></li>
            <li class=""><a href="#idTab2" data-toggle="tab" role="tab">NHẬN XÉT({{$sanpham->comment_count}})</a></li>
        </ul>
        <div class="tab-content">
            <section id="idTab1" class="tab-pane active text-center" >
                <h3>Tên Sản Phẩm</h3>
                <img src="http://localhost:8000/img/{{$sanpham->avatar}}" style="width: 400px;height: 300px" alt="hinhanh">
                <div  style="margin-top: 15px">{{$sanpham->discrible}}</div>
            </section>
            <section id="idTab2" class="tab-pane " >
                @if(Auth::check())
                    <form class="form-horizontal" action="{{ route('comment',$sanpham->id)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-1" style="width: 155px"><strong>Tên Khách Hàng :</strong></div>
                            <div class="col-md-6">
                                <label class="sr-only" for="exampleInputEmail3"></label>
                                <input type="text" class="form-control" name="comment" placeholder="Nhận xét">
                            </div>
                        </div>
                        <div class="text-right" style="width: 691px;margin-top: 8px">
                            <button href="" type="submit" class="btn btn-default" style="margin-top:15px;font-family: 'Arial Black'">Đăng</button>
                        </div>

                    </form>
                    @foreach($sanpham->Comment as $comment)
                        <div class="row" style="margin-top: 20px">
                            <div class="col-md-1" style="width: 155px"><strong>{{$comment->person->name}}</strong></div>
                            <div class="col-md-6">
                                {{$comment->comment}}
                            </div>
                            @if($comment->user_id == Auth::user()->id)
                                <form class="form-horizontal" action="{!! route('delcomment',$comment->id) !!}" method="post">
                                    <input type="hidden" name="product_id" value="{{$sanpham->id}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}} ">
                                  <button  type="submit" class="btn btn-default" style="margin-top:10px;font-family: 'Arial Black'">Xóa</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                @endif

            </section>
        </div>
    </div>

    <div class="text-center" style="margin-top: 20px;padding: 15px;font-size: 30px;font-family: 'Footlight MT Light';color: #dca7a7">SẢN PHẨM LIÊN QUAN</div>
<div style="padding:0; margin:0; background-color:#fff;font-family:'Open Sans',sans-serif,arial,helvetica,verdana">
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0;left:0;width:809px;height:150px;overflow:hidden;visibility:hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position:absolute;top:0;left:0;background:url({{asset('img/loading.gif')}}) no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
            <div data-u="slides" style="cursor:default;position:relative;top:0;left:0;width:809px;height:150px;overflow:hidden;">
                @foreach($sanpham1 as $sp1)
                <div>
                    <a href="http://localhost:8000/product/{{$sp1->id}}"><img data-u="image" src="http://localhost:8000/img/{{$sp1->avatar}}" /></a>
                </div>
                @endforeach
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype" style="width:21px;height:21px;">
                    <div data-u="numbertemplate"></div>
                </div>
            </div>
            <!-- Arrow Navigator -->
        </div>
    </div>
</div>
<script src="{{asset('js/jssor.slider-23.1.6.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/product.js')}}" type="text/javascript"></script><!-- end of footer -->
<script type="text/javascript">jssor_1_slider_init();</script>
</div>
    @endsection