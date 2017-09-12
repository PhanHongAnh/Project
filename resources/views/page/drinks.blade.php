@extends('master')
@section('content')
	<div class="container">
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
					<li class="current"><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
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
					<li  class="current"><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
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
				<li class="main "><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
				<li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
				<li class="current"><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
			</ul>
	@endif<!-- /#navigation -->
</div> <!-- end of header -->
	<div id="contents" style="background: url({{asset('img/background/2.jpg')}})"> <!-- start of contents -->
		<h2 style="background-color: white"><span>Drinks</span></h2>
		<div class="row" style="padding-bottom: 20px">
			<div class="col-lg-6">
				<div class="input-group">
					<form action="{{route('search')}}" method="get">
						<input type="text" style="width: 300px;border-radius: 0" class="form-control" name = "ten_sp" placeholder="Search for...">
						<span style="float: left;padding-left: 10px">
						<button class="btn btn-success" type="submit" >Tìm Kiếm</button>
						</span>
					</form>
				</div><!-- /input-g＞roup -->
			</div>
		</div><!-- /.col-lg-6 -->
		<div id="menus">
			<ul>
				<li>
					<h3>New Drinks</h3>
					<ul>
						@foreach($sanpham_new as $new)
							{{--@if($sp->new == 1)--}}
							<li style="padding: 30px">
								<span class="price" style="color: darkmagenta">${{$new->price}}</span>
								<a href="http://localhost:8000/product/{{$new->id}}" style="text-decoration: none; font-family: 'Fira Code';font-size: 20px"><b>{{$new->name}}</b></a>
								{{--<p>{{$new->discrible}}</p>--}}
							</li>
							{{--@endif--}}
						@endforeach
					</ul>
				</li>
				<li>
					<h3>Hot Drinks</h3>
					<ul>
						@foreach($sanpham_hot as $hot)
							{{--@if($sp ->is_hot == 1)--}}
							<li style="padding: 30px">
								<span class="price" style="color: darkmagenta">${{$hot->price}}</span>
								<a href="http://localhost:8000/product/{{$hot->id}}" style="text-decoration: none; font-family: 'Fira Code';font-size: 20px"><b>{{$hot->name}}</b></a>
								{{--<p>{{$new->discrible}}</p>--}}
							</li>
							{{--@endif--}}
						@endforeach
					</ul>
				</li>
			</ul>
		</div>
		@if(count($sanpham_new)>=count($sanpham_hot))
			<div class="row">{{$sanpham_new->links()}}</div>
		@else
			<div class="row">{{$sanpham_hot->links()}}</div>
		@endif
	</div>
	</div><!-- end of contents -->
@endsection