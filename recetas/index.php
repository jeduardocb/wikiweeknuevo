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
        <h2 class="h3">WIKI RECETAS</h2>
        <p class="text-big">Bienvenido a <strong>Wikirecetas</strong> aquí podrás encontrar variedad de recetas mágicas, fáciles y rápidas. Espero que disfrutes este delicioso viaje.</p>
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
        <h2>Es importante que sepas que cuando cocinas con marihuana debes tener precaución con la ingesta de los alimentos, ya que estos pueden tener un efecto psicoactivo muy elevado si te pasas con la cantidad.</h2>
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