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
        <h1>WIKI RECETAS</h1><!--<a href="#" class="hero-link">Descubrir más</a>-->
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

    <?php getRecetas(); ?>
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
      <h2>Ultimas recetas</h2>
      <p class="text-big">Ve nuestras ultimas recetas.</p>
    </header>
    <div class="row">
      <?php getRecetasRecientes(); ?>
    </div>
  </div>
</section>

<?php
include('footer.html');
?>