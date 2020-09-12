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
        <div class="carousel-item active slide-1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="tarjeta">
                            <h4><a href="#" title="Híbrida">Híbrida</a></h4>
                            <h1 class="font-weight-bold">Banana Split</h1>
                            <p class="text-black-50">Es una cepa híbrida pero tiene sativa dominante. Te hace sentir feliz, eufórico y relajado. Ayuda con el estrés y la fatiga. Con sabor a cítricos dulces.</p>
                            <p class="m-0"><a href="#" title="Ver" class="btn btn-outline-info">Ver</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item slide-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="tarjeta">
                            <h4><a href="#" title="Híbrida">Híbrida</a></h4>
                            <h1 class="font-weight-bold">Banana Split</h1>
                            <p class="text-black-50">Es una cepa híbrida pero tiene sativa dominante. Te hace sentir feliz, eufórico y relajado. Ayuda con el estrés y la fatiga. Con sabor a cítricos dulces.</p>
                            <p class="m-0"><a href="#" title="Ver" class="btn btn-outline-info">Ver</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item slider-3">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="tarjeta">
                            <h4><a href="#" title="Híbrida">Híbrida</a></h4>
                            <h1 class="font-weight-bold">Banana Split</h1>
                            <p class="text-black-50">Es una cepa híbrida pero tiene sativa dominante. Te hace sentir feliz, eufórico y relajado. Ayuda con el estrés y la fatiga. Con sabor a cítricos dulces.</p>
                            <p class="m-0"><a href="#" title="Ver" class="btn btn-outline-info">Ver</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <div class="col-xl-4 col-md-6 col-sm-6">
            <article class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images2/noticia-1.jpg" class="card-img d-none d-sm-block" alt="Título noticia 1">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><a href="#" title="Título noticia 1" class="stretched-link">Título noticia 1</a></h4>
                            <p class="card-text">Etiam iaculis augue eget libero semper, eu volutpat libero elementum. In vitae pretium erat.</p>
                            <p class="card-text"><small class="text-muted">jueves, 3 de septiembre 2020</small></p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-6">
            <article class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images2/noticia-1.jpg" class="card-img d-none d-sm-block" alt="Título noticia 1">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><a href="#" title="Título noticia 1" class="stretched-link">Título noticia 1</a></h4>
                            <p class="card-text">Etiam iaculis augue eget libero semper, eu volutpat libero elementum. In vitae pretium erat.</p>
                            <p class="card-text"><small class="text-muted">jueves, 3 de septiembre 2020</small></p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-6">
            <article class="card mb-4 mb-sm-5">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="images2/noticia-1.jpg" class="card-img d-none d-sm-block" alt="Título noticia 1">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><a href="#" title="Título noticia 1" class="stretched-link">Título noticia 1</a></h4>
                            <p class="card-text">Etiam iaculis augue eget libero semper, eu volutpat libero elementum. In vitae pretium erat.</p>
                            <p class="card-text"><small class="text-muted">jueves, 3 de septiembre 2020</small></p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
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
                <article class="card">
                    <img src="images2/receta-1.jpg" class="card-img-top" alt="Receta 1">
                    <div class="card-body">
                        <h4 class="card-title"><a href="#" title="Receta 1" class="stretched-link text-primary">Receta 1</a></h4>
                        <p class="card-text">Donec sit amet magna vehicula, malesuada sapien efficitur, laoreet nibh. Vestibulum nec tortor massa. Mauris id suscipit nunc. Praesent ac hendrerit sapien, ut accumsan velit. Duis pretium sed urna in porttitor.</p>
                        <p class="card-text"><small class="text-muted">Tiempo de preparación: <b>15 minutos</b></small></p>
                    </div>
                </article>
                <article class="card">
                    <img src="images2/receta-2.jpg" class="card-img-top" alt="Receta 2">
                    <div class="card-body">
                        <h4 class="card-title"><a href="#" title="Receta 2" class="stretched-link text-primary">Receta 2</a></h4>
                        <p class="card-text">Donec sit amet magna vehicula, malesuada sapien efficitur, laoreet nibh. Vestibulum nec tortor massa. Mauris id suscipit nunc. Praesent ac hendrerit sapien, ut accumsan velit. Duis pretium sed urna in porttitor.</p>
                        <p class="card-text"><small class="text-muted">Tiempo de preparación: <b>10 minutos</b></small></p>
                    </div>
                </article>
                <article class="card">
                    <img src="images2/receta-1.jpg" class="card-img-top" alt="Receta 1">
                    <div class="card-body">
                        <h4 class="card-title"><a href="#" title="Receta 3" class="stretched-link text-primary">Receta 3</a></h4>
                        <p class="card-text">Donec sit amet magna vehicula, malesuada sapien efficitur, laoreet nibh. Vestibulum nec tortor massa. Mauris id suscipit nunc. Praesent ac hendrerit sapien, ut accumsan velit. Duis pretium sed urna in porttitor.</p>
                        <p class="card-text"><small class="text-muted">Tiempo de preparación: <b>20 minutos</b></small></p>
                    </div>
                </article>
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