<?php
include("_header.html");
include("_navbar.html");
include_once("cepa_controller.php");
include_once("util.php");

$idweed = htmlspecialchars($_GET['idweed']);
?>

<div class="fh5co-loader"></div>

<div id="page">



	<div id="fh5co-product">
		<div class="container">
			<div class="card">
				<div class="container-fliud">
					<div class="wrapper row">
						<div class="preview col-md-6">

							<div class="preview-pic tab-content">
								<div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252" />
								</div>
								<div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
								<div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
								<div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
								<div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
							</div>
							<ul class="preview-thumbnail nav nav-tabs">
								<li class="active">
									<a data-target="#pic-1" data-toggle="tab">
										<img src="http://placekitten.com/200/126" />
									</a>
								</li>
								<li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a>
								</li>
							</ul>

						</div>
						<div class="details col-md-6">
							<h3 class="product-title"><?php nombre($idweed); ?></h3>
							<div class="rating">
								<div class="stars">
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star checked"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</div>
								<span class="review-no">41 reviews</span>
							</div>
							<p class="product-description"><?php descipcion($idweed); ?></p>
							<h4 class="price">current price: <span>$180</span></h4>
							<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87
									votes)</strong></p>
							<h5 class="sizes">sizes:
								<span class="size" data-toggle="tooltip" title="small">s</span>
								<span class="size" data-toggle="tooltip" title="medium">m</span>
								<span class="size" data-toggle="tooltip" title="large">l</span>
								<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
							</h5>
							<h5 class="colors">colors:
								<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
								<span class="color green"></span>
								<span class="color blue"></span>
							</h5>
							<div class="action">
								<button class="add-to-cart btn btn-default" type="button">add to cart</button>
								<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<!--product detail-->
				<div class="fh5co-tabs animate-box">
					<ul class="fh5co-tab-nav">
						<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Product
									Details</span></a></li>
						<li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Specification</span></a></li>
						<li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-star"></i></span><span class="hidden-xs">Feedback &amp;
									Ratings</span></a></li>
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