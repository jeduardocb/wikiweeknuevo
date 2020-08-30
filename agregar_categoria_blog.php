<?php
    include("_header.html");
    include("_navbar.html");
    include_once("util.php");
   
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
    <form action="controlador_addCategoria_blog.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre de la Nueva Categoria:</label>
        <input type="text" class="form-control" name="nuevaCategoria" id="nuevaCategoria"  placeholder="Salud" required>
      </div>
      
      <input type="submit" value="Agregar Categoria" name="submit">
    </form>
    <form action="controlador_editarCategoria.php" method="post"> 
        <?= getListadoCategoriasBlog(); ?>
        <input type="submit" value="Editar Categorias" name="submit">
    </form>

</div>

<?php
include("_footer.html");
?>
<script type="text/javascript">
    //document.getElementById("add-Categoria").onclick=addCategoria;
</script>