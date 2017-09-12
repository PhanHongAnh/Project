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
	<ul id="infos1">
		<li><a href="#">Đăng Ký</a></li>
		<li><a href="#">Đăng Nhập</a></li>
	</ul>
	<a href="#" id="logo"></a>
	<ul id="navigation">
		<li ><a href="http://localhost:8000/trangchu"><span>Home</span></a></li>
		<li class="main"><a href="http://localhost:8000/menu"><span>Menu</span></a></li>
		<li><a href="http://localhost:8000/food"><span>Food</span></a></li>
		<li><a href="http://localhost:8000/drinks"><span>Drinks</span></a></li>
	</ul>
		<!--Giỏ Hàng-->
		<div class="text-right" >
			<a href="http://localhost:8000/giohang" style="font-size: 18px;text-decoration: none;font-family: fantasy">Giỏ Hàng</a>
		</div><!-- /#navigation -->
</div>  <!-- end of header -->
	<div id="contents"> <!-- start of contents --> 
		<h2><span>Blog</span></h2>
		<div id="blogs">
			<div class="sidebar">
				<div class="posts">
					<h3>Recent Posts</h3>
					<ul>
						<li><a href="blog.html">Aliquam varius pulvinar</a></li>
						<li><a href="blog.html">Fusce purus commodo</a></li>
						<li><a href="blog.html">Praesent molestie</a></li>
						<li><a href="blog.html">Vestibulum tempus erat</a></li>
						<li><a href="blog.html">Sed quis diam ac neque</a></li>
					</ul>
				</div>
				<div class="archives">
					<h3>Archives</h3>
					<ul>
						<li><a href="">December</a></li>
						<li><a href="">June</a></li>
						<li><a href="">November</a></li>
						<li><a href="">May</a></li>
						<li><a href="">October</a></li>
						<li><a href="">April</a></li>
						<li><a href="">September</a></li>
						<li><a href="">March</a></li>
						<li><a href="">August</a></li>
						<li><a href="">February</a></li>
						<li><a href="">July</a></li>
						<li><a href="">January</a></li>
					</ul>
				</div>
			</div>
			<div class="section">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores culpa dicta, dignissimos fuga ipsa iure omnis optio possimus quaerat quam qui reiciendis saepe temporibus tenetur veritatis? A, accusantium, dicta distinctio dolor doloribus earum enim esse eum hic in laudantium nulla odio officiis, pariatur praesentium quis vero. Ab beatae commodi eaque minima mollitia possimus rem. Beatae dolore error ex excepturi facere fugit id magnam maiores mollitia neque, officia perferendis recusandae rem sunt vel veniam voluptatibus. Blanditiis fugiat magni nostrum optio provident soluta. A dignissimos enim fugit illum ipsum minima molestias, officia praesentium quae recusandae repellat reprehenderit repudiandae voluptas! Accusantium illum incidunt iure iusto magnam magni natus nesciunt odit quae sapiente tempora, temporibus totam veritatis. Assumenda debitis ea nisi omnis perspiciatis reprehenderit suscipit, vitae! Deleniti deserunt eius eligendi expedita porro! Atque est magni maxime optio quam ratione voluptate voluptatum? Ab accusamus ad enim harum, id illo illum magni, nobis possimus quae, rem rerum saepe voluptate? At corporis debitis eaque exercitationem expedita modi quas quia sunt velit voluptas? A animi aut doloribus eius fuga natus neque recusandae ut voluptatibus. Accusantium adipisci asperiores beatae blanditiis commodi dolore eius ipsam itaque laborum laudantium magni modi non quam quos recusandae rem rerum tempore, totam, ut velit.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores culpa dicta, dignissimos fuga ipsa iure omnis optio possimus quaerat quam qui reiciendis saepe temporibus tenetur veritatis? A, accusantium, dicta distinctio dolor doloribus earum enim esse eum hic in laudantium nulla odio officiis, pariatur praesentium quis vero. Ab beatae commodi eaque minima mollitia possimus rem. Beatae dolore error ex excepturi facere fugit id magnam maiores mollitia neque, officia perferendis recusandae rem sunt vel veniam voluptatibus. Blanditiis fugiat magni nostrum optio provident soluta. A dignissimos enim fugit illum ipsum minima molestias, officia praesentium quae recusandae repellat reprehenderit repudiandae voluptas! Accusantium illum incidunt iure iusto magnam magni natus nesciunt odit quae sapiente tempora, temporibus totam veritatis. Assumenda debitis ea nisi omnis perspiciatis reprehenderit suscipit, vitae! Deleniti deserunt eius eligendi expedita porro! Atque est magni maxime optio quam ratione voluptate voluptatum? Ab accusamus ad enim harum, id illo illum magni, nobis possimus quae, rem rerum saepe voluptate? At corporis debitis eaque exercitationem expedita modi quas quia sunt velit voluptas? A animi aut doloribus eius fuga natus neque recusandae ut voluptatibus. Accusantium adipisci asperiores beatae blanditiis commodi dolore eius ipsam itaque laborum laudantium magni modi non quam quos recusandae rem rerum tempore, totam, ut velit.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores culpa dicta, dignissimos fuga ipsa iure omnis optio possimus quaerat quam qui reiciendis saepe temporibus tenetur veritatis? A, accusantium, dicta distinctio dolor doloribus earum enim esse eum hic in laudantium nulla odio officiis, pariatur praesentium quis vero. Ab beatae commodi eaque minima mollitia possimus rem. Beatae dolore error ex excepturi facere fugit id magnam maiores mollitia neque, officia perferendis recusandae rem sunt vel veniam voluptatibus. Blanditiis fugiat magni nostrum optio provident soluta. A dignissimos enim fugit illum ipsum minima molestias, officia praesentium quae recusandae repellat reprehenderit repudiandae voluptas! Accusantium illum incidunt iure iusto magnam magni natus nesciunt odit quae sapiente tempora, temporibus totam veritatis. Assumenda debitis ea nisi omnis perspiciatis reprehenderit suscipit, vitae! Deleniti deserunt eius eligendi expedita porro! Atque est magni maxime optio quam ratione voluptate voluptatum? Ab accusamus ad enim harum, id illo illum magni, nobis possimus quae, rem rerum saepe voluptate? At corporis debitis eaque exercitationem expedita modi quas quia sunt velit voluptas? A animi aut doloribus eius fuga natus neque recusandae ut voluptatibus. Accusantium adipisci asperiores beatae blanditiis commodi dolore eius ipsam itaque laborum laudantium magni modi non quam quos recusandae rem rerum tempore, totam, ut velit.</p>
			</div>
		</div>
	</div> <!-- end of contents -->
	@stop