<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
session_start();

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
    <table id="cart" class="table table-responsive">
        <thead>
            <tr>
                <th style="width:50%">Cepa</th>
                <th style="width:10%">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?= getListadoRecetas(); ?>
        </tbody>
    </table>
</div>
<script>
</script>
<?php
include("_footer.html");
?>