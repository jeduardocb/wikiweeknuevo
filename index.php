<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>

<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
			<li style="background-image: url(images/img_bg_1.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="price">$800</span>
								<h2>Alato Cabinet</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
								<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(images/img_bg_2.jpg);">
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="price">$530</span>
								<h2>The Haluz Rocking Chair</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
								<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(images/img_bg_3.jpg);">
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="price">$750</span>
								<h2>Alato Cabinet</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
								<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(images/img_bg_4.jpg);">
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="price">$540</span>
								<h2>The WW Chair</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
								<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-services" class="fh5co-bg-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="Carousel" class="carousel slide">

					<ol class="carousel-indicators">
						<li data-target="#Carousel" data-slide-to="0" class="active"></li>
						<li data-target="#Carousel" data-slide-to="1"></li>
						<li data-target="#Carousel" data-slide-to="2"></li>
					</ol>

					<!-- Carousel items -->
					<div class="carousel-inner">

						<div class="item active">
							<div class="row">
								<?= getCategorias();  ?>
							</div>
							<!--.row-->
						</div>
						<!--.item-->
					</div>
					<!--.row-->
				</div>
				<!--.item-->

			</div>
			<!--.carousel-inner-->
		</div>
		<!--.carousel-inner-->
		<div class="control-box pager">
			<a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
			<a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
		</div>
	</div>
	<!--.Carousel-->
	<!-- /.control-box -->
</div>
<!--.Carousel-->

</div>
</div>
</div>
</div>
<div id="fh5co-product">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<span>Cool Stuff</span>
				<h2>Products.</h2>
				<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center animate-box">
				<div class="product">
					<div class="product-grid" style="background-image:url(images/product-1.jpg);">
						<div class="inner">
							<p>
								<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
								<a href="single.html" class="icon"><i class="icon-eye"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">Hauteville Concrete Rocking Chair</a></h3>
						<span class="price">$350</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center animate-box">
				<div class="product">
					<div class="product-grid" style="background-image:url(images/product-2.jpg);">
						<span class="sale">Sale</span>
						<div class="inner">
							<p>
								<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
								<a href="single.html" class="icon"><i class="icon-eye"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">Pavilion Speaker</a></h3>
						<span class="price">$600</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center animate-box">
				<div class="product">
					<div class="product-grid" style="background-image:url(images/product-3.jpg);">
						<div class="inner">
							<p>
								<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
								<a href="single.html" class="icon"><i class="icon-eye"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">Ligomancer</a></h3>
						<span class="price">$780</span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center animate-box">
				<div class="product">
					<div class="product-grid" style="background-image:url(images/product-4.jpg);">
						<div class="inner">
							<p>
								<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
								<a href="single.html" class="icon"><i class="icon-eye"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">Alato Cabinet</a></h3>
						<span class="price">$800</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center animate-box">
				<div class="product">
					<div class="product-grid" style="background-image:url(images/product-5.jpg);">
						<div class="inner">
							<p>
								<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
								<a href="single.html" class="icon"><i class="icon-eye"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">Earing Wireless</a></h3>
						<span class="price">$100</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 text-center animate-box">
				<div class="product">
					<div class="product-grid" style="background-image:url(images/product-6.jpg);">
						<div class="inner">
							<p>
								<a href="single.html" class="icon"><i class="icon-shopping-cart"></i></a>
								<a href="single.html" class="icon"><i class="icon-eye"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">Sculptural Coffee Table</a></h3>
						<span class="price">$960</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/img_bg_5.jpg);">
	<div class="container">
		<div class="row">
			<div class="display-t">
				<div class="display-tc">
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-eye"></i>
							</span>

							<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Creativity Fuel</span>

						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-shopping-cart"></i>
							</span>

							<span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Happy Clients</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-shop"></i>
							</span>
							<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">All Products</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-clock"></i>
							</span>

							<span class="counter js-counter" data-from="0" data-to="5605" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Hours Spent</span>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-started">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Newsletter</h2>
				<p>Just stay tune for our latest Product. Now you can subscribe</p>
			</div>
		</div>
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-inline">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<button type="submit" class="btn btn-default btn-block">Subscribe</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include("_footer.html");
?>