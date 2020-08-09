<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
session_start();

if (isset($_SESSION["mensaje"])) {
  if ($_SESSION["mensaje"] == true) {
    echo '<div class="alert alert-success text-center">
                <strong>La receta se ha subido correctamente</strong> 
              </div>';
  } else {
    echo '<div class="alert alert-danger text-center">
                <strong>Hubo un error al subir la receta</strong> 
            </div>';
  }
  $_SESSION["mensaje"] = null;
}

?>
<div class="container">
  <form id="addBlog" action="controlador_agregar_receta.php" method="POST" enctype="multipart/form-data">
   
    <div class="form-group">
      <label>Categoria:</label>
      <?= crear_select("id", "nombre", "categoria_recetas") ?>
    </div>
    <div class="form-group ">
      <label for="usr">Titulo:</label>
      <input type="text" class="form-control " id="titulo" name="titulo" required>
    </div>
    <div class="form-group ">
      <label for="usr">Descripcion:</label>
      <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" required></textarea>
    </div>
      <div class="form-group ">
      <label for="usr">Subtitulo:</label>
      <input type="text" class="form-control " id="subtitulo" name="subtitulo" required>
    </div>
    <div class="form-group ">
      <label for="usr">Descripcion del Subtitulo:</label>
      <textarea type="textarea" class="form-control " id="descripcionsubtitulo" name="descripcionsubtitulo" required></textarea>
    </div>
    <div class="form-group ">
      <label for="usr">Ingredientes:</label>
      <textarea type="textarea" class="form-control " id="ingredientes" name="ingredientes" required></textarea>
    </div>

  
 
    <div class="form-group">
      <label class="col-sm-2 control-label">Fotografias:</label>
      <input type="file" class="form-control" id="upload" name="upload[]" multiple required>
    </div>
    <input type="submit" value="Agregar Receta" name="submit">

  </form>
</div>

<?php
include("_footer.html");
?>
