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
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label>Categoria:</label>
    </div>
    <div class="form-group">
      <?= crear_select("id", "nombre", "categoria_blog") ?>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label for="usr">Titulo:</label>
    </div>
    <div class="form-group ">
      <input type="text" class="form-control " id="titulo" name="titulo" required>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label for="usr">Descripcion:</label>
    </div>
    <div class="form-group ">
      <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" required></textarea>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label for="usr">Subtitulo:</label>
    </div>
    <div class="form-group ">
      <input type="text" class="form-control " id="subtitulo" name="subtitulo" required>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label for="usr">Descripcion del Subtitulo:</label>
    </div>
    <div class="form-group">
      <textarea type="textarea" class="form-control " id="descripcionsubtitulo" name="descripcionsubtitulo" required></textarea>
    </div>

    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label class="col-sm-2 control-label">Fotografias:</label>
    </div>
    <div class="form-group text-center">
      <input type="file" class="btn btn-outline-info btn-lg rounded-pill" class="form-control" id="upload" name="upload[]" multiple required>
    </div>
    <div class="form-group text-center">
      <input type="submit" class="btn btn-info btn-lg rounded-pill" value="Agregar Blog" name="submit">
    </div>

  </form>
</div>

<?php
include("_footer.html");
?>