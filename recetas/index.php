<?php
include('header.html');
include('nav.html');
include('util.php');
?>

<!-- Hero Section-->
<section style="background: url(img/banner.jpg); background-size: cover; background-position: center center" class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1>wiki Recetas</h1><a href="#" class="hero-link">Descubrir más</a>
      </div>
    </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
  </div>
</section>
<!-- Intro Section-->
<section class="intro">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="h3">Descripción</h2>
        <p class="text-big">Aqui va una <strong>introdicción</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
      </div>
    </div>
  </div>
</section>
<section class="featured-posts no-padding-top">
  <div class="container">
    <!-- Post-->

    <?php getBlogs(); ?>
  </div>
</section>
<!-- Divider Section-->
<section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
      </div>
    </div>
  </div>
</section>
<!-- Latest Posts -->
<section class="latest-posts">
  <div class="container">
    <header>
      <h2>Ultimos blogs</h2>
      <p class="text-big">Ve nuestros ultimos blogs.</p>
    </header>
    <div class="row">
      <?php getBlogRecientes(); ?>
    </div>
  </div>
</section>
<!-- Newsletter Section-->
<section class="newsletter no-padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Suscribete para mas contenido</h2>
        <p class="text-big">Texto de prueba</p>
      </div>
      <div class="col-md-8">
        <div class="form-holder">
          <form action="#">
            <div class="form-group">
              <input type="email" name="email" id="email" placeholder="correo@correo.com">
              <button type="submit" class="submit">Suscribirse</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Gallery Section-->
<section class="gallery no-padding">
  <div class="row">
    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item"><a href="img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-1.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div>
        </a></div>
    </div>
    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item"><a href="img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-2.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div>
        </a></div>
    </div>
    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item"><a href="img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-3.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div>
        </a></div>
    </div>
    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item"><a href="img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-4.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div>
        </a></div>
    </div>
  </div>
</section>

<?php
include('footer.html');
?>