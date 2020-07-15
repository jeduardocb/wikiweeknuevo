<?php
include("_header.html");
include("_navbar.html");
//include_once("cepa_controller.php");
include_once("util.php");

$idweed = htmlspecialchars($_GET['idweed']);
?>

<div class="fh5co-loader"></div>

<div id="page">
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
							
							<?= getProgressBar($idweed); ?>
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
					<ul class="fh5co-tab-nav">
						<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Detalles</span></a></li>
						<li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Specification</span></a></li>
						<li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-star"></i></span><span class="hidden-xs">Reviews</span></a></li>
					</ul>

					<!-- Tabs -->
					<div class="fh5co-tab-content-wrap">

						<div class="fh5co-tab-content tab-content active" data-tab-content="1">
							<div class="col-md-10 col-md-offset-1">
								<span class="price">SRP: $350</span>
								<h2>Hauteville Rocking Chair</h2>
								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci
									dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo
									reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>

								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat
									soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga
									molestiae asperiores obcaecati corporis sint illo facilis.</p>

								<div class="row">
									<div class="col-md-6">
										<h2 class="uppercase">Keep it simple</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
									<div class="col-md-6">
										<h2 class="uppercase">Less is more</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
								</div>

							</div>
						</div>

						<div class="fh5co-tab-content tab-content" data-tab-content="2">
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

						<div class="fh5co-tab-content tab-content" data-tab-content="3">
							<div class="col-md-10 col-md-offset-1">
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
</div>

<?php
include("_footer.html");
?>