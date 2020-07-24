<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>

<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
			<?= getCepaCarrusel(); ?>
		</ul>
	</div>
</aside>

<div id="fh5co-services" class="fh5co-bg-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="row">
					<?= getCategorias();  ?>
				</div>
				<!--.item-->

			</div>
			<!--.carousel-inner-->
		</div>
	</div>
	<!--.Carousel-->
	<!-- /.control-box -->
</div>
<!--.Carousel-->
<div id="fh5co-product">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Cepas destacadas</h2>
				<p>¡Nuestras mejores cepas!</p>
			</div>
		</div>
		<div class="row">
			<?= getCepasDestacadas(); ?>
		</div>
	</div>
</div>




<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(images/fondo3.jpg);">
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
							<span class="counter-label">Visitas</span>

						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-shopping-cart"></i>
							</span>

							<span class="counter js-counter" data-from="0" data-to="450" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Cepas</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-shop"></i>
							</span>
							<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Categorias</span>
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
<?php
include("_footer.html");
?>