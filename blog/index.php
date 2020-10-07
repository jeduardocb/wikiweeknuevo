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
        <h1>WIKI BLOG</h1><!--<a href="#" class="hero-link">WIKIBLOG</a>-->
      </div>
    </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
  </div>
</section>
<!-- Intro Section-->
<section class="intro">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="h3">WIKI BLOG</h2>
        <p class="text-big">Bienvenido a nuestro <strong>WikiBlog</strong> nuestro objetivo es brindar información sobre todo lo relacionado con marihuana. Aquí encontraras los mejores artículos sobre este mundo verde.</p>
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

<?php
include('footer.html');
?>