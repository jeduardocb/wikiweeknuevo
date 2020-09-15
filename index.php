<?php
require_once('_header.html');
require_once('_navbar.html');
include_once("util.php");
?>

<div id="carrusel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carrusel" data-slide-to="0" class="active"></li>
        <li data-target="#carrusel" data-slide-to="1"></li>
        <li data-target="#carrusel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php getCepaCarrusel(); ?>
    </div>
</div>

<!-- Categorías -->
<section class="container">
    <div class="row">
        <?= getCategorias();  ?>
    </div>
</section>
<!-- Categorías fin -->

<!-- Destacadas -->
<section id="destacadas" class="mt-4 mt-md-5 mb-4 mb-md-5 pt-4 pt-md-5 pb-4 pb-md-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-subtitle pl-4 mb-4 border-info">
                    <h1>Cepas destacadas</h1>
                    <p class="h5">¡Nuestras mejores cepas!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?= getCepasDestacadas(); ?>
        </div>
    </div>
</section>
<!-- Destacadas fin -->

<!-- Noticias -->
<section class="container-fluid border-bottom border-light">
    <div class="row">
        <div class="col">
            <div class="title-subtitle pl-4 mb-4 border-0 text-center">
                <h1>Últimas noticias</h1>
                <p class="h5">¡Nuestras mejores noticias!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <?php getBlogRecientes(); ?>
    </div>
</section>
<!-- Noticias fin -->

<!-- Recetas -->
<section class="container">
    <div class="row">
        <div class="col">
            <div class="title-subtitle pl-4 mb-4 mt-4 mt-lg-5 border-primary">
                <h1>Recetas recientes</h1>
                <p class="h5">¡Nuestras mejores recetas!</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-group">
                <?php getRecetasRecientes(); ?>
            </div>
        </div>
    </div>
</section>
<!-- Recetas fin -->

<!-- Estadísticas -->
<section id="estadisticas" class="mt-4 mt-xl-5 bg-warning pt-4 pt-xl-5 pb-4 pb-xl-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="media text-white pt-4 pt-xl-0">
                    <span class="lnr lnr-eye display-3 mr-3"></span>
                    <div class="media-body">
                        <h1 class="mt-0"><?php countCepas() ?> <small class="d-block font-weight-bold h4">Visitas</small></h1>
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

<?php include_once('_footer.html') ?>

