<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");

$idcategoria = htmlspecialchars($_GET['idcategoria']);
?>

<!-- Destacadas -->
<section id="categoria" class="mt-4 mt-md-5 mb-4 mb-md-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title-subtitle pl-4 mb-4 border-info text-center">
                    <h1><?= getNombreCategoria($idcategoria) ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?= getCepas($idcategoria); ?>
        </div>
    </div>
</section>
<!-- Destacadas fin -->
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

<?php
include("_footer.html");
?>