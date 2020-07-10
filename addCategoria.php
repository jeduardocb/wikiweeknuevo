<?php
    include("_header.html");
    include("_navbar.html");
    include_once("util.php");
    session_start();
    if(isset($_SESSION["mensaje"])){
        if($_SESSION["mensaje"] == true){
            echo '<div class="alert alert-success text-center">
                    <strong>La Categoria se ha subido correctamente</strong> 
                  </div>';
        }else{
            echo '<div class="alert alert-danger text-center">
                    <strong>Hubo un error al subir la Categoria</strong> 
                </div>';
        }
        $_SESSION["mensaje"] = null;
    }
?>


<div class="container">
    <div class="alert alert-success text-center" id="mensaje" hidden></div>
    <form action="controlador_addCategoria.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre de la Nueva Categoria:</label>
        <input type="text" class="form-control" name="nuevaCategoria" id="nuevaCategoria"  placeholder="Hibrido" required>
      </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Sube una imagen:</label>
        <input type="file" class="form-control" id="upload" name="upload"  required>
    </div>
      <input type="submit" value="Upload Image" name="submit">
    </form>

</div>

<?php
include("_footer.html");
?>
<script type="text/javascript">
    //document.getElementById("add-Categoria").onclick=addCategoria;
</script>