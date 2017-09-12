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
				</ul>
		@endif
			<!-- /#navigation -->
		</div> <!-- end of header -->
		<!-- start of contents -->
		{{--<div style="padding: 15px 0;">--}}
		{{--@endif--}}
		<div class="row">
			<div class="col-md-12" style="margin: 15px 0;margin-bottom:70px; padding:0 ">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="{{asset('img/hinh1.jpg')}}" alt="Slide 1">
							<div class="carousel-caption">
								<h3>Title 1</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At enim error maxime molestias quasi reiciendis.</p>
							</div>
						</div>
						<div class="item">
							<img src="{{asset('img/hinh2.jpg')}}" alt="Slide 2">
							<div class="carousel-caption">
								<h3>Title 2</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores earum enim quibusdam quisquam reiciendis sed.</p>
							</div>
						</div>
						<div class="item">
							<img src="{{asset('img/hinh3.jpg')}}" alt="Slide 3">
							<div class="carousel-caption">
								<h3>Title 3</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores earum enim quibusdam quisquam reiciendis sed.</p>
							</div>
						</div>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
			{{--</div>--}}
		</div>
	</div>
		 <!-- end of contents -->
@endsection