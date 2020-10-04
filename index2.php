
<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
session_start();
  

?>
<div id="carrusel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carrusel" data-slide-to="0" class="active"></li>
		<li data-target="#carrusel" data-slide-to="1"></li>
		<li data-target="#carrusel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<?= getCepaCarrusel(); ?>
	
	</div>
</div>

<!-- Categorías -->
<section class="container">
	<div class="row">
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="card bg-dark text-white border-0 mt-4 mt-xl-5">
				<img src="images/cat-hibrida.jpg" class="card-img" alt="Híbrida">
				<div class="card-img-overlay">
					<h3 class="card-title"><a href="#" title="Híbrida" class="stretched-link text-white">Híbrida</a></h3>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="card bg-dark text-white border-0 mt-4 mt-xl-5">
				<img src="images/cat-sativa.jpg" class="card-img" alt="Sativa">
				<div class="card-img-overlay">
					<h3 class="card-title"><a href="#" title="Sativa" class="stretched-link text-white">Sativa</a></h3>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6 col-md-6">
			<div class="card bg-dark text-white border-0 mt-4 mt-xl-5">
				<img src="images/cat-indica.jpg" class="card-img" alt="Índica">
				<div class="card-img-overlay">
					<h3 class="card-title"><a href="#" title="Índica" class="stretched-link text-white">Índica</a></h3>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Categorías fin -->

<!-- Destacadas -->
<section id="destacadas" class="mt-4 mt-md-5 mb-4 mb-md-5 pt-4 pt-md-5 pb-4 pb-md-5">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="title-subtitle pl-4 mb-4 border-info">
					<h1>Cepas destacadas</h1>
					<p class="h5">¡Nuestras mejores cepas!</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="bg-white shadow text-center pt-2 pt-sm-4 pb-2 pb-sm-4 mb-4">
					<h5 class="m-0"><a href="#" title="Sativa">Sativa</a></h5>
					<h4 class="mb-2"><a href="#hola" title="Lemon Haze" class="text-dark">Lemon Haze</a></h4>
					<p class="m-0"><img src="images/weed.jpg" alt="Weed" class="img-fluid"></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="bg-white shadow text-center pt-2 pt-sm-4 pb-2 pb-sm-4 mb-4">
					<p><img src="images/weed.jpg" alt="Weed" class="img-fluid"></p>
					<h5 class="m-0"><a href="#" title="Sativa">Sativa</a></h5>
					<h4><a href="#hola" title="Lemon Haze" class="text-dark">Lemon Haze</a></h4>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="text-center">
					<h5><a href="#" title="Sativa">Sativa</a></h5>
					<h4><a href="#hola" title="Lemon Haze" class="text-dark border-bottom border-dark text-decoration-none">Lemon Haze</a></h4>
					<p class="bg-white mt-4 pt-3 pb-3"><img src="images/weed.jpg" alt="Weed" class="img-fluid"></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="text-center">
					<p class="bg-white pt-3 pb-3"><img src="images/weed.jpg" alt="Weed" class="img-fluid"></p>
					<h5><a href="#" title="Sativa">Sativa</a></h5>
					<h4><a href="#hola" title="Lemon Haze" class="text-dark border-bottom border-dark text-decoration-none">Lemon Haze</a></h4>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-md-6 col-lg-3">
				<div class="bg-white shadow text-center pt-2 pt-sm-3 mb-4">
					<h5 class="m-0"><a href="#" title="Sativa">Sativa</a></h5>
					<h4 class="mb-3"><a href="#hola" title="Lemon Haze" class="text-dark">Lemon Haze</a></h4>
					<p class="m-0"><img src="images/weed-2.jpg" alt="Weed" class="img-fluid"></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="bg-white shadow text-center pb-2 pb-sm-3 mb-4">
					<p><img src="images/weed-2.jpg" alt="Weed" class="img-fluid"></p>
					<h5 class="m-0"><a href="#" title="Sativa">Sativa</a></h5>
					<h4><a href="#hola" title="Lemon Haze" class="text-dark">Lemon Haze</a></h4>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="text-center">
					<h5><a href="#" title="Sativa">Sativa</a></h5>
					<h4><a href="#hola" title="Lemon Haze" class="text-dark border-bottom border-dark text-decoration-none">Lemon Haze</a></h4>
					<p class="bg-white mt-4 shadow"><img src="images/weed-2.jpg" alt="Weed" class="img-fluid"></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-3">
				<div class="text-center">
					<p class="bg-white shadow"><img src="images/weed-2.jpg" alt="Weed" class="img-fluid"></p>
					<h5><a href="#" title="Sativa">Sativa</a></h5>
					<h4><a href="#hola" title="Lemon Haze" class="text-dark border-bottom border-dark text-decoration-none">Lemon Haze</a></h4>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Destacadas fin -->

<!-- Noticias -->
<section class="container-fluid border-bottom border-light">
	<div class="row">
		<div class="col">
			<div class="title-subtitle pl-4 mb-4 border-0 text-center">
				<h1>Últimas noticias</h1>
				<p class="h5">¡Nuestras mejores noticias!</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-4 col-md-6 col-sm-6">
			<article class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="images/noticia-1.jpg" class="card-img d-none d-sm-block" alt="Título noticia 1">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h4 class="card-title"><a href="#" title="Título noticia 1" class="stretched-link">Título noticia 1</a></h4>
							<p class="card-text">Etiam iaculis augue eget libero semper, eu volutpat libero elementum. In vitae pretium erat.</p>
							<p class="card-text"><small class="text-muted">jueves, 3 de septiembre 2020</small></p>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="col-xl-4 col-md-6 col-sm-6">
			<article class="card mb-3">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="images/noticia-1.jpg" class="card-img d-none d-sm-block" alt="Título noticia 1">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h4 class="card-title"><a href="#" title="Título noticia 1" class="stretched-link">Título noticia 1</a></h4>
							<p class="card-text">Etiam iaculis augue eget libero semper, eu volutpat libero elementum. In vitae pretium erat.</p>
							<p class="card-text"><small class="text-muted">jueves, 3 de septiembre 2020</small></p>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="col-xl-4 col-md-6 col-sm-6">
			<article class="card mb-4 mb-sm-5">
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src="images/noticia-1.jpg" class="card-img d-none d-sm-block" alt="Título noticia 1">
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h4 class="card-title"><a href="#" title="Título noticia 1" class="stretched-link">Título noticia 1</a></h4>
							<p class="card-text">Etiam iaculis augue eget libero semper, eu volutpat libero elementum. In vitae pretium erat.</p>
							<p class="card-text"><small class="text-muted">jueves, 3 de septiembre 2020</small></p>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>
<!-- Noticias fin -->

<!-- Recetas -->
<section class="container">
	<div class="row">
		<div class="col">
			<div class="title-subtitle pl-4 mb-4 mt-4 mt-lg-5 border-primary">
				<h1>Recetas recientes</h1>
				<p class="h5">¡Nuestras mejores recetas!</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card-group">
				<article class="card">
					<img src="images/receta-1.jpg" class="card-img-top" alt="Receta 1">
					<div class="card-body">
						<h4 class="card-title"><a href="#" title="Receta 1" class="stretched-link text-primary">Receta 1</a></h4>
						<p class="card-text">Donec sit amet magna vehicula, malesuada sapien efficitur, laoreet nibh. Vestibulum nec tortor massa. Mauris id suscipit nunc. Praesent ac hendrerit sapien, ut accumsan velit. Duis pretium sed urna in porttitor.</p>
						<p class="card-text"><small class="text-muted">Tiempo de preparación: <b>15 minutos</b></small></p>
					</div>
				</article>
				<article class="card">
					<img src="images/receta-2.jpg" class="card-img-top" alt="Receta 2">
					<div class="card-body">
						<h4 class="card-title"><a href="#" title="Receta 2" class="stretched-link text-primary">Receta 2</a></h4>
						<p class="card-text">Donec sit amet magna vehicula, malesuada sapien efficitur, laoreet nibh. Vestibulum nec tortor massa. Mauris id suscipit nunc. Praesent ac hendrerit sapien, ut accumsan velit. Duis pretium sed urna in porttitor.</p>
						<p class="card-text"><small class="text-muted">Tiempo de preparación: <b>10 minutos</b></small></p>
					</div>
				</article>
				<article class="card">
					<img src="images/receta-1.jpg" class="card-img-top" alt="Receta 1">
					<div class="card-body">
						<h4 class="card-title"><a href="#" title="Receta 3" class="stretched-link text-primary">Receta 3</a></h4>
						<p class="card-text">Donec sit amet magna vehicula, malesuada sapien efficitur, laoreet nibh. Vestibulum nec tortor massa. Mauris id suscipit nunc. Praesent ac hendrerit sapien, ut accumsan velit. Duis pretium sed urna in porttitor.</p>
						<p class="card-text"><small class="text-muted">Tiempo de preparación: <b>20 minutos</b></small></p>
					</div>
				</article>
			</div>
		</div>
	</div>
</section>
<!-- Recetas fin -->

<!-- Estadísticas -->
<section id="estadisticas" class="mt-4 mt-xl-5 bg-warning pt-4 pt-xl-5 pb-4 pb-xl-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="media text-white pt-4 pt-xl-0">
					<span class="lnr lnr-eye display-3 mr-3"></span>
					<div class="media-body">
						<h1 class="mt-0">22070 <small class="d-block font-weight-bold h4">Visitas</small></h1>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="media text-white pt-4 pt-xl-0">
					<span class="lnr lnr-book display-3 mr-3"></span>
					<div class="media-body">
						<h1 class="mt-0">450 <small class="d-block font-weight-bold h4">Cepas</small></h1>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="media text-white pt-4 pt-xl-0">
					<span class="lnr lnr-database display-3 mr-3"></span>
					<div class="media-body">
						<h1 class="mt-0">700 <small class="d-block font-weight-bold h4">Categorías</small></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Estadísticas fin -->

<!-- Footer -->
<footer id="the-end" class="p-3 p-md-4">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-6">
				<p class="m-0 text-black-50 pt-3 pt-md-4"><b class="text-dark lead font-weight-bold">WikiWeed</b> es el sitio web de cannabis más grande del mundo, con más de 15 millones de visitantes mensuales y 40 millones de visitas a su sitio web y aplicaciones móviles.</p>
			</div>
			<nav class="col-md-2 col-sm-6 col-6">
				<ul class="list-unstyled p-3 p-md-4 border-left m-0">
					<li><a href="#" title="">About</a></li>
					<li><a href="#" title="">Help</a></li>
					<li><a href="#" title="">Contact</a></li>
					<li><a href="#" title="">Terms</a></li>
					<li><a href="#" title="">Meetups</a></li>
				</ul>
			</nav>
			<nav class="col-md-2 col-sm-6 col-6">
				<ul class="list-unstyled p-3 p-md-4 border-left m-0">
					<li><a href="#" title="">Shop</a></li>
					<li><a href="#" title="">Privacy</a></li>
					<li><a href="#" title="">Testimonials</a></li>
					<li><a href="#" title="">Handbook</a></li>
					<li><a href="#" title="">Held Desk</a></li>
				</ul>
			</nav>
			<nav class="col-md-4 col-sm-6 col-6">
				<ul class="list-unstyled p-3 p-md-4 border-left m-0">
					<li><a href="#" title="">Find Designers</a></li>
					<li><a href="#" title="">Find Developers</a></li>
					<li><a href="#" title="">Teams</a></li>
					<li><a href="#" title="">Advertise</a></li>
					<li><a href="#" title="">API</a></li>
				</ul>
			</nav>
		</div>
	</div>
</footer>
<!-- Footer fin -->

<script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
