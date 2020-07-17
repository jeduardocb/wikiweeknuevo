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

if (isset($_GET["idweed"])) {
    $idweed = $_GET["idweed"];
    $con = conectar_bd();
    $sql = "SELECT weed.nombre, weed.descripcion, categoria.nombre AS catNom FROM weed, categoria
            WHERE weed.id_categoria = categoria.id
            AND weed.id=$idweed";
    $result = $con->query($sql);
    $datos = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
        $nombre = $datos["nombre"];
        $descripcion = $datos["descripcion"];
        $categoria = $datos["catNom"];
    }
}

?>
<div class="container">
    <?= formEditCepa($idweed, $nombre, $descripcion, $categoria); ?>
</div>

<?php
include("_footer.html");
?>