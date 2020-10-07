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
      <input type="text" class="form-control " id="titulo" name="titulo" placeholder="Brownie" required>
    </div>
    <div class="form-group ">
      <label for="usr">Descripcion:</label>
      <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" placeholder="Brownie de Marihuana receta y preparación de un clásico que a la gente le encanta como postre, merienda, etc, con un efecto divertido incluido.

Hay que tener en cuenta que se debe comer con moderación, sin superar la ración aconsejada, porque si no, el efecto puede dejar de ser divertido, sobre todo en personas que no están muy acostumbradas al cannabis. " required></textarea>
    </div>
      <div class="form-group ">
      <label for="usr">Subtitulo:</label>
      <input type="text" class="form-control " id="subtitulo" name="subtitulo" placeholder="Modo de preparación:" required>
    </div>
    <div class="form-group ">
      <label for="usr">Descripcion del Subtitulo:</label>
      <textarea type="textarea" class="form-control " id="descripcionsubtitulo" name="descripcionsubtitulo" placeholder="Antes de empezar tendrás que tener lista 24 horas antes la mantequilla de marihuana, por ello te facilitamos este enlace.
Brownie de Marihuana receta y preparaciónCon la mantequilla ya lista, lo primero es disolver el chocolate junto con la mantequilla al baño María." required></textarea>
    </div>
    <div class="form-group ">
      <label for="usr">Ingredientes:</label>
      <textarea type="textarea" class="form-control " id="ingredientes" name="ingredientes" placeholder="150 gr de chocolate en polvo
90 gr de mantequilla de marihuana
1 taza de azúcar" required></textarea>
    </div>
      <div class="form-group ">
      <label for="usr">Tiempo de preparacion:</label>
      <textarea type="textarea" class="form-control " id="tiempo" name="tiempo" placeholder="30-50 minutos" required></textarea>
    </div>

  
 
    <div class="form-group">
      <label class="col-sm-2 control-label"><strong>Meter 2</strong> Fotografias:</label>
      <input type="file" class="form-control" id="upload" name="upload[]" multiple required>
    </div>
    <input type="submit" value="Agregar Receta" name="submit">

  </form>
</div>

<?php
include("_footer.html");
?>
