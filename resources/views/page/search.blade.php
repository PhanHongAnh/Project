@extends('master')
@section('script')
    <script>
        $(function(){
            //Số lượng từ giới hạn
            var limitW = 42;
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
                    <li ><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
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
    </div>  <!-- end of header -->
    <div id="contents"> <!-- start of contents -->
        <h2><span>こんにちは</span></h2>
        <div class="row" style="padding-bottom: 20px">
            <div class="col-lg-6">
                <div class="input-group">
                    <form action="{!! route('search') !!}" method="get">
                        <input type="text" style="width: 300px;border-radius: 0" class="form-control" name = "ten_sp" placeholder="Search for...">
                        <span style="float: left;padding-left: 10px">
						<button class="btn btn-success" type="submit" >Tìm Kiếm</button>
						</span>
                    </form>
                </div><!-- /input-group -->
            </div>
        </div><!-- /.col-lg-6 -->
        <div id="menus">
            <ul>
                <li>
                    <h3>Product Search</h3>
                    <ul>
                        @foreach($product as $sp)
                                <li>
                                    <span class="price">${{$sp->price}}</span>
                                    <a href="http://localhost:8000/product/{{$sp->id}}" style="text-decoration: none"><b>{{$sp->name}}</b></a>
                                    <p>{{$sp->discrible}}</p>
                                </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="row">{{$product->links()}}</div>
            {{--</div id="menus1">--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi harum itaque neque recusandae rerum suscipit? Ab adipisci, doloremque fuga impedit laudantium libero non odio officiis omnis quo recusandae similique velit? Asperiores beatae corporis deserunt iste laboriosam, maxime necessitatibus neque numquam quaerat sed tempora voluptatem. Aliquid atque delectus, hic iusto, magnam, maxime perspiciatis provident quasi quidem rerum tempora veritatis voluptatibus? Aliquid, consequatur, delectus ea eaque impedit ipsum minima non nulla odio odit ratione repellat sequi soluta, totam voluptates. Accusantium, asperiores eaque eligendi in magnam nisi, non nostrum numquam perspiciatis possimus quibusdam similique sint, vel velit voluptates. Accusamus aperiam aspernatur doloribus fugit illo itaque laboriosam molestias necessitatibus non provident, recusandae sapiente vero. A assumenda consectetur dolorem doloremque, eaque exercitationem inventore iure nam numquam, odit officia, optio quidem rem unde vel! Accusamus aperiam architecto debitis dicta dolorem fugiat in laborum magni, maiores saepe. Accusamus atque consectetur dolorem ea facilis iste labore repellendus suscipit unde vero! Atque cumque hic molestias officiis omnis placeat rerum voluptatem. Ab eum excepturi impedit molestiae nam omnis perferendis suscipit, vel vitae voluptate! A aspernatur, consequatur consequuntur cumque distinctio dolorem ea eaque fugit hic magni maxime nam nisi numquam pariatur placeat quaerat quas quisquam quo repellat, reprehenderit sapiente temporibus, vitae.</p>--}}
            {{--</div>--}}

    </div> <!-- end of contents -->
@stop