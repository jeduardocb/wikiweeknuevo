<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");

if (isset($_SESSION["mensaje"])) {
    if ($_SESSION["mensaje"] == true) {
        echo '<div class="alert alert-success text-center">
                <strong>La Cepa se ha subido correctamente</strong> 
              </div>';
    } else {
        echo '<div class="alert alert-danger text-center">
                <strong>Hubo un error al subir la Cepa</strong> 
            </div>';
    }
    $_SESSION["mensaje"] = null;
}

?>

<div class="container">
    <h1>Modificar cepa</h1>
    <table id="cart" class="table table-responsive text-center">
        <thead>
            <tr>
                <th style="width:50%">Cepa</th>
                <th class="text-center">categoria</th>
                <th style="width:10%">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?= getListadoCepas(); ?>
        </tbody>
    </table>
</div>

<?php
include("_footer.html");
?>