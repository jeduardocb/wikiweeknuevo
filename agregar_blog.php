<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
session_start();

if (isset($_SESSION["mensaje"])) {
  if ($_SESSION["mensaje"] == true) {
    echo '<div class="alert alert-success text-center">
                <strong>El blog se ha subido correctamente</strong> 
              </div>';
  } else {
    echo '<div class="alert alert-danger text-center">
                <strong>Hubo un error al subir el Blog</strong> 
            </div>';
  }
  $_SESSION["mensaje"] = null;
}

?>
<div class="container">
  <form id="addBlog" action="controlador_agregar_blog.php" method="POST" enctype="multipart/form-data">
    <div class="form-group ">
      <label for="usr">Titulo:</label>
      <input type="text" class="form-control " id="titulo" name="titulo" required>
    </div>
    <div class="form-group ">
      <label for="usr">Descripcion:</label>
      <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" required></textarea>
    </div>

    <div class="form-group">
      <label>Categoria:</label>
      <?= crear_select("id", "nombre", "categoria_blog") ?>
    </div>
 
    <div class="form-group">
      <label class="col-sm-2 control-label">Fotografias:</label>
      <input type="file" class="form-control" id="upload" name="upload[]" multiple required>
    </div>
    <input type="submit" value="Agregar Blog" name="submit">

  </form>
</div>

<?php
include("_footer.html");
?>