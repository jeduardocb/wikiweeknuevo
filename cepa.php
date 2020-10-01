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
								labels: ['Pine', 'Pepery', 'Myrcene'],
								datasets: [{
									label: 'Propiedades',
									data: [15, 25, 60],
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
						<h3 class="mt-5 mb-5 text-center">Sensaciones</h3>
						<div class="row">
							<div class="col-12 col-md-6 col-lg-4">
								<table class="table bg-white shadow">
									<thead>
										<tr>
											<th scope="col" colspan="3" class="h5 bg-success text-white">Efectos</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row" class="align-middle">Felicidad</th>
											<td class="align-middle text-right">55%</td>
											<td class="align-middle"><img src="images2/hoja-blanca.png" style="background-size: 100% 50%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">Euforia</th>
											<td class="align-middle text-right">10%</td>
											<td class="align-middle"><img src="images2/hoja-blanca.png" style="background-size: 100% 10%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">Relajación</th>
											<td class="align-middle text-right">9%</td>
											<td class="align-middle"><img src="images2/hoja-blanca.png" style="background-size: 100% 9%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">Energizante</th>
											<td class="align-middle text-right">8%</td>
											<td class="align-middle"><img src="images2/hoja-blanca.png" style="background-size: 100% 8%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">Creatividad</th>
											<td class="align-middle text-right">22%</td>
											<td class="align-middle"><img src="images2/hoja-blanca.png" style="background-size: 100% 22%"></td>
										</tr>
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
										<tr>
											<th scope="row" class="align-middle">ABC</th>
											<td class="align-middle text-right">90%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 90%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">DEF</th>
											<td class="align-middle text-right">80%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 80%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">GHI</th>
											<td class="align-middle text-right">70%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 70%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">JKL</th>
											<td class="align-middle text-right">60%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 60%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">MNO</th>
											<td class="align-middle text-right">50%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 50%"></td>
										</tr>
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
										<tr>
											<th scope="row" class="align-middle">P</th>
											<td class="align-middle text-right">40%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 40%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">Q</th>
											<td class="align-middle text-right">30%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 30%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">R</th>
											<td class="align-middle text-right">20%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 20%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">S</th>
											<td class="align-middle text-right">10%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 10%"></td>
										</tr>
										<tr>
											<th scope="row" class="align-middle">T</th>
											<td class="align-middle text-right">5%</td>
											<td class="align-middle"><img src="images2/hoja.png" style="background-size: 100% 5%"></td>
										</tr>
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
					</div>
					<div class="tab-pane fade" id="crecimiento" role="tabpanel" aria-labelledby="pCrecimiento">
						<h3 class="mt-5 text-center">Crecimiento</h3>
						<p class="text-center text-muted mb-5">Patrocinado por: <img src="images2/wikihigh-the-cannabis-intelligence-logotipo.png" class="img-fluid" alt="WikiHigh The Cannabis Intelligence logotipo"></p>
						<h4>Fenotipo</h4>
						<div class="d-flex text-center h6">
							<div class="flex-fill">Indica</div>
							<div class="flex-fill border border-dark bg-white">Sativa</div>
							<div class="flex-fill">Híbrida</div>
						</div>
						<h4>Dificultad</h4>
						<div class="d-flex text-center h6 text-warning">
							<div class="flex-fill">Fácil</div>
							<div class="flex-fill border border-warning bg-white">Moderado</div>
							<div class="flex-fill">Difícil</div>
						</div>
						<h4>Altura</h4>
						<div class="d-flex text-center h6 text-success">
							<div class="flex-fill">&lt; 30 in</div>
							<div class="flex-fill">30" hasta 78"</div>
							<div class="flex-fill border border-success bg-white">&gt; 78"</div>
						</div>
						<h4>Cosecha (Oz/Ft)<sup>2</sup></h4>
						<div class="d-flex text-center h6 text-danger">
							<div class="flex-fill">0.5 - 1</div>
							<div class="flex-fill border border-danger bg-white">1 - 3</div>
							<div class="flex-fill">3 - 6</div>
						</div>
						<h4>Florecimiento (semanas)</h4>
						<div class="d-flex text-center h6 text-primary">
							<div class="flex-fill">7 - 9</div>
							<div class="flex-fill border border-primary bg-white">10 - 12</div>
							<div class="flex-fill">&gt; 12</div>
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