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

if (isset($_GET["idblog"])) {
    //echo $_GET["idblog"];
    $idblog = $_GET["idblog"];
    $con = conectar_bd();
    $sql = "select blog.titulo,blog.descripcion,blog.id_categoria_blog,blog.subtitulo,blog.descripcion2, categoria_blog.nombre from blog,categoria_blog where 
  categoria_blog.id= blog.id_categoria_blog AND blog.id=$idblog";
    $result = $con->query($sql);
    $datos = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
        $nombre = $datos["titulo"];
        $descripcion = $datos["descripcion"];
        $id_categoria_blog = $datos["id_categoria_blog"];
        $subtitulo = $datos["subtitulo"];
        $descripcion2 = $datos["descripcion2"];
        $categoria = $datos["nombre"];
    }
}

?>
<div class="container">
    <?= formEditBlog($idblog, $nombre, $descripcion, $id_categoria_blog, $subtitulo, $descripcion2, $categoria);
    tablaFotosEditBlog($idblog) ?>
</div>

<?php
include("_footer.html");
?>
<script>
    function borrar(idFoto, idReceta) {
        if (window.confirm('¿Esta seguro que desea eliminar la foto?')) {
            window.location.href = 'borrarFotosBlog.php?idfoto=' + idFoto + '&idblog=' + idReceta;
        }
    }
</script>