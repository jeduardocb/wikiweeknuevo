<?php
include("_header.html");
include("_navbar.html");
//include_once("cepa_controller.php");
include_once("util.php");

$idweed = htmlspecialchars($_GET['idweed']);
?>
<style>
	.rate-base-layer {
		color: #aaa;
	}

	.rate-hover-layer {
		color: orange;
	}

	.rate2 {
		font-size: 35px;
	}

	.rate2 .rate-hover-layer {
		color: pink;
	}

	.rate2 .rate-select-layer {
		color: red;
	}

	.im {
		background-image: url('./images/heart.gif');
		background-size: 32px 32px;
		background-repeat: no-repeat;
		width: 32px;
		height: 32px;
		display: inline-block;
	}

	.im2 {
		background-image: url('./images/emoji5.png');
		background-size: 64px 64px;
		background-repeat: no-repeat;
		width: 64px;
		height: 64px;
		display: inline-block;
	}

	#rate5 .rate-base-layer span,
	#rate7 .rate-base-layer span {
		opacity: 0.5;
	}
</style>

<div class="fh5co-loader"></div>

<div id="fh5co-product">
	<div class="container tarjeta-cepa">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6 text-center">
						<?= getImagenesWeed($idweed) ?>
					</div>
					<div class="details col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a class="categoria" href=""><?= getCategoria($idweed) ?> </a>
							</div>
							<div class="col-md-6 text-right">
								<div class="rating">
									<div class="stars">
										<span class="review-no">4.4 </span><span class="fa fa-star checked" style="color: #069173;"></span><span class="review-no"> 41 reviews </span>
									</div>
								</div>
							</div>
						</div>

						<hr>
						<h1 class="product-title text-center"><?php getNombreWeed($idweed); ?></h1>

						<p class="product-description text-justify"><?php getDescripcionWeed($idweed); ?></p>
						<div class="row">
							<div class="col-md-12 text-center">
								<hr>
								<h3 style="color: #295229;">Cannabinoides</h3>
							</div>

							<div class="col-md-6">
								<h4>
									<i class="fa fa-cannabis verde-icono">
									</i> THC: <span class="verde-icono">
										<?php getThc($idweed); ?>%
									</span>
								</h4>
							</div>
							<div class="col-md-6 text-right">
								<h4>
									<i class="fas fa-seedling verde-icono"></i>
									CBD:<span class="verde-icono">
										<?php getCbd($idweed); ?>%
									</span>
								</h4>
							</div>
						</div>

						<?= //getProgressBar($idweed); ?>
						<div class="row reviews">
							<div class="col-md-12 review-title">
								<h4>Calculado por 41 reseñas: </h4>
							</div>
							<div class="col-md-6 text-left">
								Calmante
							</div>
							<div class="col-md-6 text-right">
								Energizante
							</div>
							<div class="col-md-12">
								<div class="progress">
									<div class="progress-bar progress-bar-striped progress-bar-animated progress-calmante" role="progressbar" style="width:70%">
										Calmante
									</div>
									<div class="progress-bar progress-bar-striped progress-bar-animated progress-energizante" role="progressbar" style="width:30%">
										Energizante
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<!--product detail-->
			<div class="fh5co-tabs animate-box">
				<ul id="detalles" class="fh5co-tab-nav">
					<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Detalles</span></a></li>
					<li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Specification</span></a></li>
					<li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-star"></i></span><span class="hidden-xs">Reviews</span></a></li>
				</ul>

				<!-- Tabs -->
				<div class="fh5co-tab-content-wrap">

					<div class="fh5co-tab-content tab-content active tab-detalles" data-tab-detalles="1">
						<div class="col-md-10 col-md-offset-1">
							<h2>Efectos</h2>

							<div class="row">
								<div class="col-md-4">
									<h2 class="uppercase">Sensaciones</h2>
									<?php getSensaciones($idweed) ?>
								</div>
								<div class="col-md-4">
									<h2 class="uppercase">Ayuda a/con</h2>
									<?php getAyuda($idweed) ?>
								</div>
								<div class="col-md-4">
									<h2 class="uppercase">Negativos</h2>
									<?php getNegativos($idweed) ?>
								</div>
							</div>

						</div>
					</div>

					<div class="fh5co-tab-content tab-content tab-detalles" data-tab-detalles="2">
						<div class="col-md-10 col-md-offset-1">
							<h3>Product Specification</h3>
							<ul>
								<li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
									adipisci dignissimos consectetur magni quas eius</li>
								<li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta
									eligendi</li>
								<li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
								<li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit?
									Veritatis tenetur odio delectus quibusdam officiis est.</li>
							</ul>
							<ul>
								<li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
									adipisci dignissimos consectetur magni quas eius</li>
								<li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta
									eligendi</li>
								<li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
								<li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit?
									Veritatis tenetur odio delectus quibusdam officiis est.</li>
							</ul>
						</div>
					</div>

					<div class="fh5co-tab-content tab-content tab-detalles" data-tab-detalles="3">
						<div class="col-md-10 col-md-offset-1">
							<div class="col-md-12">
								<h1>¿Quieres agregar una reseña?</h1>
								<form class="form-inline" method="POST" action="reseñaController.php">
									<div class="form-group">
										<div class="rate"></div>
									</div>
									<div class="form-group">
										<label for="email">Comentario:</label><br>
										<textarea name="reseña" class="form-control" rows="5" id="comment" style="width: 1024px; margin-bottom: 15px;"></textarea>
										<br>
									</div>
									<br><button type="submit" class="btn btn-default">Submit</button>
								</form>
							</div>
							<h3>Happy Buyers</h3>
							<div class="feed">
								<div>
									<blockquote>
										<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
											adipisci dignissimos consectetur magni quas eius nobis reprehenderit
											soluta eligendi quo reiciendis fugit? Veritatis tenetur odio
											delectus quibusdam officiis est.</p>
									</blockquote>
									<h3>&mdash; Louie Knight</h3>
									<span class="rate">
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
									</span>
								</div>
								<div>
									<blockquote>
										<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
											adipisci dignissimos consectetur magni quas eius nobis reprehenderit
											soluta eligendi quo reiciendis fugit? Veritatis tenetur odio
											delectus quibusdam officiis est.</p>
									</blockquote>
									<h3>&mdash; Joefrey Gwapo</h3>
									<span class="rate">
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
										<i class="icon-star2"></i>
									</span>
								</div>
							</div>
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
<script src="js/rater.min.js"></script>
<script>
	$(document).ready(function() {
		var options = {
			max_value: 5,
			step_size: 0.5,
			selected_symbol_type: 'hearts',
			url: 'http://localhost/test.php',
			initial_value: 3,
			update_input_field_name: $("#input2"),
		}
		$(".rate").rate();

		$(".rate2").rate(options);

		$(".rate2").on("change", function(ev, data) {
			console.log(data.from, data.to);
		});

		$(".rate2").on("updateError", function(ev, jxhr, msg, err) {
			console.log("This is a custom error event");
		});

		$(".rate2").rate("setAdditionalData", {
			id: 42
		});
		$(".rate2").on("updateSuccess", function(ev, data) {
			console.log(data);
		});

	});
</script>