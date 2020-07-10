<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");

session_start();
if (isset($_SESSION["mensaje"])) {
  if ($_SESSION["mensaje"] == true) {
    echo '<div class="alert alert-success text-center">
                    <strong>La Categoria se ha subido correctamente</strong> 
                  </div>';
  } else {
    echo '<div class="alert alert-danger text-center">
                    <strong>Hubo un error al subir la Categoria</strong> 
                </div>';
  }
  $_SESSION["mensaje"] = null;
}
?>
<div class="container">
    <div class="alert alert-success text-center" id="mensaje" hidden></div>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre del Nuevo Terpeno:</label>
        <input type="text" class="form-control" id="nuevoTerpeno" aria-describedby="emailHelp" placeholder="Spicy">
      </div>
      <button type="button" id="add-Terpeno"class="btn btn-primary">Agregar Terpeno</button>
    </form>

</div>

<?php
include("_footer.html");
?>
<script type="text/javascript">
    document.getElementById("add-Terpeno").onclick=addTerpeno;
</script>