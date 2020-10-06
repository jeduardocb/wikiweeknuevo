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

if (isset($_GET["idreceta"])) {
    $idreceta = $_GET["idreceta"];
    $con = conectar_bd();
    $sql = "SELECT recetas.id AS idReceta, recetas.titulo, recetas.subtitulo, recetas.descripcion, recetas.descripcion2, categoria_recetas.nombre AS catNom, categoria_recetas.id AS catId
            FROM recetas, categoria_recetas
            WHERE recetas.id_categoria_receta = categoria_recetas.id
            AND recetas.id=$idreceta";
    $result = $con->query($sql);
    $datos = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
        $idreceta = $datos["idReceta"];
        $nombre = $datos["titulo"];
        $descripcion = $datos["descripcion"];
        $subtitulo = $datos["subtitulo"];
        $descripcion2 = $datos["descripcion2"];
        $categoria = $datos["catNom"];
        $categoriaId = $datos["catId"];
    }
}

?>
<div class="container">
    <?= formEditReceta($nombre, $descripcion, $subtitulo, $descripcion2, $categoria, $categoriaId, $idreceta);
    tablaFotosEditReceta($idreceta); ?>
</div>

<?php
include("_footer.html");
?>
<script>
    function setHeight(fieldId) {
        document.getElementById(fieldId).style.height = document.getElementById(fieldId).scrollHeight + 'px';
    }
    setHeight('descripcion');
    setHeight('descripcion2');
</script>

<script>
    function borrar(idFoto, idReceta) {
        if (window.confirm('¿Esta seguro que desea eliminar la foto?')) {
            window.location.href = 'borrarFotosRecetas.php?idfoto=' + idFoto + '&idreceta=' + idReceta;
        }
    }
</script>