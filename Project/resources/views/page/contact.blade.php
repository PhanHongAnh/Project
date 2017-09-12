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
		@endif<!-- /#navigation -->
	</div>  <!-- end of header -->
		<div id="contents"> <!-- start of contents -->
		<h2 class="contact-us"><span>Contact</span></h2>
		<div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores culpa dicta, dignissimos fuga ipsa iure omnis optio possimus quaerat quam qui reiciendis saepe temporibus tenetur veritatis? A, accusantium, dicta distinctio dolor doloribus earum enim esse eum hic in laudantium nulla odio officiis, pariatur praesentium quis vero. Ab beatae commodi eaque minima mollitia possimus rem. Beatae dolore error ex excepturi facere fugit id magnam maiores mollitia neque, officia perferendis recusandae rem sunt vel veniam voluptatibus. Blanditiis fugiat magni nostrum optio provident soluta. A dignissimos enim fugit illum ipsum minima molestias, officia praesentium quae recusandae repellat reprehenderit repudiandae voluptas! Accusantium illum incidunt iure iusto magnam magni natus nesciunt odit quae sapiente tempora, temporibus totam veritatis. Assumenda debitis ea nisi omnis perspiciatis reprehenderit suscipit, vitae! Deleniti deserunt eius eligendi expedita porro! Atque est magni maxime optio quam ratione voluptate voluptatum? Ab accusamus ad enim harum, id illo illum magni, nobis possimus quae, rem rerum saepe voluptate? At corporis debitis eaque exercitationem expedita modi quas quia sunt velit voluptas? A animi aut doloribus eius fuga natus neque recusandae ut voluptatibus. Accusantium adipisci asperiores beatae blanditiis commodi dolore eius ipsam itaque laborum laudantium magni modi non quam quos recusandae rem rerum tempore, totam, ut velit.</p>
			<table class="contact-details">
				<tbody>
				<tr><td><b>EMAIL</b></td><td>:</td><td>NGUYENVANTRUNG@EMAIL.COM</td></tr>
				<tr><td><b>ADDRESS</b></td><td>:</td><td>LUC NAM - BAC GIANG</td></tr>
				<tr><td><b>PHONE</b></td><td>:</td><td>0911 44 66 88</td></tr>
				</tbody>
			</table>
		</div>
	</div> <!-- end of contents -->
	</div>
	@endsection