<?php
    include("_header.html");
    include("_navbar.html");
    include_once("util.php");

    session_start();
?>
<form action="controlador_editarImagenCategoria.php" method="post" enctype="multipart/form-data">
    <input type="hidden"  name="id_categoria" value="<?= $_GET["id_categoria"] ?>">
     <div class="form-group">
            <label class="col-sm-2 control-label">Archivos</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
    <input type="submit" value="Actualizar" name="submit">
</form>

<?php include("_footer.html");?>
