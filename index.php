<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
header('Content-Type: text/html; charset=utf-8');
$onclick = 'onclick="location.href = ' . "'controlador_cerrarSesion.php'" . '"';
?>

<style>
	.product-card {
		width: 340px;
		position: relative;
		box-shadow: 0 2px 7px #dfdfdf;
		margin: 50px 15px;
		background: #fafafa;
		display: inline-block;
	}

	.badge {
		position: absolute;
		left: 0;
		top: 20px;
		text-transform: uppercase;
		font-size: 13px;
		font-weight: 700;
		background: red;
		color: #fff;
		padding: 3px 10px;
	}

	.product-tumb {
		display: flex;
		align-items: center;
		justify-content: center;
		height: 300px;
		padding: 50px;
		background: #f0f0f0;
	}

	.product-tumb img {
		max-width: 100%;
		max-height: 100%;
	}

	.product-details {
		padding: 30px;
	}

	.product-catagory {
		display: block;
		font-size: 12px;
		font-weight: 700;
		text-transform: uppercase;
		color: #ccc;
		margin-bottom: 18px;
	}

	.product-details h4 a {
		font-weight: 500;
		display: block;
		margin-bottom: 18px;
		text-transform: uppercase;
		color: #363636;
		text-decoration: none;
		transition: 0.3s;
	}

	.product-details h4 a:hover {
		color: #fbb72c;
	}

	.product-details p {
		font-size: 15px;
		line-height: 22px;
		margin-bottom: 18px;
		color: #999;
	}

	.product-bottom-details {
		overflow: hidden;
		border-top: 1px solid #eee;
		padding-top: 20px;
	}

	.product-bottom-details div {
		float: left;
		width: 50%;
	}

	.product-price {
		font-size: 18px;
		color: #fbb72c;
		font-weight: 600;
	}

	.product-price small {
		font-size: 80%;
		font-weight: 400;
		text-decoration: line-through;
		display: inline-block;
		margin-right: 5px;
	}

	.product-links {
		text-align: right;
	}

	.product-links a {
		display: inline-block;
		margin-left: 5px;
		color: #e1e1e1;
		transition: 0.3s;
		font-size: 17px;
	}

	.product-links a:hover {
		color: #fbb72c;
	}
</style>

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

				<div class="row text-center">
					<?= getCategorias();  ?>
				</div>
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
					<div class="col-md-4 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-eye"></i>
							</span>

							<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Visitas</span>

						</div>
					</div>
					<div class="col-md-4 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-shopping-cart"></i>
							</span>

							<span class="counter js-counter" data-from="0" data-to="<?php countCepas() ?>" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Cepas</span>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 animate-box">
						<div class="feature-center">
							<span class="icon">
								<i class="icon-shop"></i>
							</span>
							<span class="counter js-counter" data-from="0" data-to="700" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Categorias</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.modal-dialog {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
	}

	.modal-content {
		height: 100%;
		min-height: 100%;
		border-radius: 0;
	}
</style>

<div class="modal fullscreen-modal fade cookieModal" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 id="cookieModalLabel"><img src="diseño/logo.png" width="10%"> Wikiweed</h2>
			</div>
			<div class="modal-body">
				<h4>Si continúas afirmas que has leido nuestra Política de Privacidad y aceptas nuestros Términos y Condiciones.</h4>
				<p>Al presionar aceptar estas aceptando que eres mayor de edad</p>
				<p>
					<a href="/privacy-statement" target="_blank">Clic aqui para ver la politica de privacidad</a>
				</p>
			</div>
			<div class="modal-footer">
				<div class="col-md-6">
					<button id="cancelar" type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal">Cancelar</button>
				</div>
				<div class="col-md-6">
					<button id="cookieModalConsent" type="button" class="btn btn-success btn-lg btn-block" data-dismiss="modal">Aceptar</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include("_footer.html");
?>
<script>
	
</script>