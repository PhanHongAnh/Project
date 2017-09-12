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
					<li class="current"><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
					<li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
					<li ><a href="http://localhost:8000/food"><span>Food</span></a></li>
					<li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
					<li><a href="http://localhost:8000/drinks"><span>Suggest</span></a></li>
				</ul>
		@endif
		<!-- /#navigation -->
		</div> <!-- end of header -->
		<div id="contents"> <!-- start of contents -->
		<h2 class="booking"><span>Booking Product</span></h2>
		@if(Session::has('thong_bao'))
			<div class="alert alert-success text-center" role="alert" style="width: 30%">
                {{Session::get('thong_bao')}}</div>
		@endif
		<div id="booking" style="text-align: left">
			<form action="{{route('dat_hang')}}" method="Post">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label>Name</label>
					<input class="form-control text-center" style="width: 40%" name="name" value="{{Auth::user()->name}}"  readonly/>
				</div>
				<div class="form-group ">
					<label >Email</label>
					<input class="form-control text-center"  style="width: 40%" name="email" value="{{Auth::user()->email}}" readonly />
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input class="form-control text-center"  style="width: 40%" name="phone" placeholder="Nhập địa chỉ" value="{{Auth::user()->phone}}"  />
				</div>
				<div class="form-group ">
					<label>Address</label>
					<input class="form-control text-center"  style="width: 40%" name="address" placeholder="Nhập địa chỉ" value="{{Auth::user()->address}}"  />
				</div>
				<div style="margin-top: 5px;margin-left: 150px">
					<input type="submit" value="Xác Nhận">
				</div>
			</form>
		</div>
	</div> <!-- end of contents -->
	</div>
@endsection