<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
session_start();

$idweed = htmlspecialchars($_GET['idweed']);
?>

<section class="container main pt-3 pb-3 pt-md-5 pb-md-5">
	<div class="row">
		<div class="col-md-5 order-2 order-md-1">
			<div id="galeria" class="carousel slide" data-touch="true">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="images2/cepa-1.jpg" class="d-block w-100" alt="Cepa 1">
					</div>
					<div class="carousel-item">
						<img src="images2/cepa-1b.jpg" class="d-block w-100" alt="Cepa 1">
					</div>
					<div class="carousel-item">
						<img src="images2/cepa-1.jpg" class="d-block w-100" alt="Cepa 1">
					</div>
					<div class="carousel-item">
						<img src="images2/cepa-1b.jpg" class="d-block w-100" alt="Cepa 1">
					</div>
				</div>
				<ol class="carousel-indicators">
					<li data-target="#galeria" data-slide-to="0" class="active" style="background-image:url(images2/cepa-1_thumbnail.jpg"></li>
					<li data-target="#galeria" data-slide-to="1" style="background-image:url(images2/cepa-1b_thumbnail.jpg"></li>
					<li data-target="#galeria" data-slide-to="2" style="background-image:url(images2/cepa-1_thumbnail.jpg"></li>
					<li data-target="#galeria" data-slide-to="3" style="background-image:url(images2/cepa-1b_thumbnail.jpg"></li>
				</ol>
			</div>
		</div>
		<div class="col-md-7 ml-auto order-1 order-md-2 pl-lg-5">
			<p class="lead text-muted mt-md-3"><a href="#" title="Categoría" class="text-purple"><?= getCategoria($idweed) ?></a></p>
			<h1 class="mb-3"><?php getNombreWeed($idweed); ?></h1>
		</div>
		<div class="col-md-7 ml-auto order-3 pl-lg-5">
			<p class="text-black-50 mb-md-5 p-4 bg-light"><?php getDescripcionWeed($idweed); ?></p>
		</div>
		<div class="col-md-7 ml-auto order-4 pl-lg-5">
			<div class="row justify-content-center">
				<div class="col-8 col-md-5">
					<canvas id="pay" width="400" height="400"></canvas>
					<script>
						var ctx = document.getElementById('pay').getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'pie',
							data: {
								labels: [<?php getTerpenosNombre($idweed); ?>],
								datasets: [{
									label: 'Propiedades',
									data: [<?php getTerpenosPorcentajes($idweed); ?>],
									backgroundColor: [
										'rgba(89,0,128,0.8)',
										'rgba(89,0,128,0.9)',
										'rgba(89,0,128,1)'
									],
									hoverBackgroundColor: '#000'
								}]
							},
							options: {
								legend: {
									display: false
								},
								tooltips: {
									enabled: false
								},
								plugins: {
									labels: [{
											render: 'label',
											position: 'outside',
											arc: true,
											fontSize: 16
										},
										{
											render: 'percentage',
											fontSize: 16,
											fontColor: '#fff'
										}
									]
								}
							}
						});
					</script>
				</div>
				<div class="col-12 col-md-7 text-center">
					<p class="h4 rombo pl-3"><b><?php getThc($idweed); ?>%</b> <span class="bg-primary text-white">THC</span></p>
					<p class="h4 rombo pl-3"><span class="bg-success text-white">CBD</span> <?php getCbd($idweed); ?>%</b></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="informacion" class="bg-light pb-3 pb-md-5">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="nav nav-pills nav-fill lead" id="pestanas" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="pSensaciones" data-toggle="tab" href="#sensaciones" role="tab" aria-controls="sensaciones" aria-selected="true"><span class="lnr lnr-smile"></span> Sensaciones</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="pReviews" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false"><span class="lnr lnr-star"></span> Reviews</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="pCrecimiento" data-toggle="tab" href="#crecimiento" role="tab" aria-controls="crecimiento" aria-selected="false"><span class="lnr lnr-leaf"></span> Crecimiento</a>
					</li>
				</ul>
				<div class="tab-content" id="pestanas">
					<div class="tab-pane fade show active" id="sensaciones" role="tabpanel" aria-labelledby="pSensaciones">
						<h3 class="mt-5 mb-5 text-center">Efectos</h3>
						<div class="row">
							<div class="col-12 col-md-6 col-lg-4">
								<table class="table bg-white shadow">
									<thead>
										<tr>
											<th scope="col" colspan="3" class="h5 bg-success text-white">Sensaciones</th>
										</tr>
									</thead>
									<tbody>
										<?php
											getSensaciones($idweed);
										?>
									</tbody>
								</table>
							</div>
							<div class="col-12 col-md-6 col-lg-4">
								<table class="table">
									<thead class="bg-warning text-white">
										<tr>
											<th scope="col" colspan="3" class="h5">Ayuda con</th>
										</tr>
									</thead>
									<tbody>
										<?php
											getAyuda($idweed);
										?>
									</tbody>
								</table>
							</div>
							<div class="col-12 col-md-6 col-lg-4">
								<table class="table">
									<thead class="thead-light">
										<tr>
											<th scope="col" colspan="3" class="h5">Negativo</th>
										</tr>
									</thead>
									<tbody>
										<?php
											getNegativos($idweed);
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="pReviews">
						<h3 class="mt-5 mb-5 text-center">Reviews</h3>
						<div class="card mb-3">
							<div class="card-body">
								<p class="lead">María Conchita Teresa Rosalinda</p>
								<p>Suspendisse ullamcorper eu odio vitae dapibus. Sed pellentesque, mi quis rutrum laoreet, tortor est luctus lectus, non scelerisque leo nisi suscipit nisi. Nam sollicitudin feugiat dictum. Curabitur quis dui hendrerit, ultrices justo quis, consequat mi. Suspendisse quis lorem pretium, sodales purus ut, cursus elit. Donec consectetur pulvinar commodo.</p>
								<p class="lead m-0"><span class="align-middle font-weight-bold">3.5</span> <img src="images2/estrella.png"><img src="images2/estrella.png"><img src="images2/estrella.png"><img src="images2/estrella-50.png"><img src="images2/estrella-0.png"></p>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-body">
								<p class="lead">Kim Jong-un</p>
								<p>Suspendisse ullamcorper eu odio vitae dapibus. Sed pellentesque, mi quis rutrum laoreet, tortor est luctus lectus, non scelerisque leo nisi suscipit nisi. Nam sollicitudin feugiat dictum. Curabitur quis dui hendrerit, ultrices justo quis, consequat mi. Suspendisse quis lorem pretium, sodales purus ut, cursus elit. Donec consectetur pulvinar commodo.</p>
								<p class="lead m-0"><span class="align-middle font-weight-bold">5</span> <img src="images2/estrella.png"><img src="images2/estrella.png"><img src="images2/estrella.png"><img src="images2/estrella.png"><img src="images2/estrella.png"></p>
							</div>
						</div>
						<div class="card mb-3">
							<div class="card-header">
								<h5 class="m-0">Ingresa tu Review</h5>
							</div>
							<div class="card-body">
								<form method="POST">
									<div class="row">
										<div class="col-12 col-sm-6">
											<input type="text" class="form-control" placeholder="Nombre" required>
										</div>
										<div class="col-12 col-sm-4">
											<input type="range" id="estrellas" class="stars" min="0" max="5" step="0.5" required>
											Calificación: <span id="valor" class="text-muted font-weight-bold"></span>

										</div>
										<div class="col-12 pt-3">
											<textarea class="form-control" rows="4" placeholder="Mensaje" required></textarea>
											<br>

											<button type="submit" class="btn btn-success btn-lg rounded-pill"><span class="lnr lnr-checkmark-circle"></span> Enviar</button>
											<br>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="crecimiento" role="tabpanel" aria-labelledby="pCrecimiento">
						<h3 class="mt-5 text-center">Crecimiento</h3>
						<p class="text-center text-muted mb-5">Patrocinado por: <img src="images2/wikihigh-the-cannabis-intelligence-logotipo.png" class="img-fluid" alt="WikiHigh The Cannabis Intelligence logotipo"></p>
						<h4>Fenotipo</h4>
						<div class="d-flex text-center h6">
							<?php
								getFenotipo($idweed);
							?>
						</div>
						<h4>Dificultad</h4>
						<div class="d-flex text-center h6 text-warning">
							'<?php
								getDificultad($idweed);
							?>
						</div>
						<h4>Altura</h4>
						<div class="d-flex text-center h6 text-success">
							<?php
								getAtura($idweed);
							?>
						</div>
						<h4>Cosecha (Oz/Ft)<sup>2</sup></h4>
						<div class="d-flex text-center h6 text-danger">
							<?php
								getRendimiento($idweed);
							?>
						</div>
						<h4>Florecimiento (semanas)</h4>
						<div class="d-flex text-center h6 text-primary">
							<?php
								getFlorecimiento($idweed);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Estadísticas -->
<section id="estadisticas" class="bg-warning pt-4 pt-xl-5 pb-4 pb-xl-5">
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

<?php
include_once('_footer.html');
?>