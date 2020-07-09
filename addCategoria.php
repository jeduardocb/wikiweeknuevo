<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>
<div class="container">
    <div class="alert alert-success text-center" id="mensaje" hidden></div>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre de la Nueva Categoria:</label>
        <input type="text" class="form-control" id="nuevaCategoria" aria-describedby="emailHelp" placeholder="Hibrido">
      </div>
        <div class="form-group">
        <label class="col-sm-2 control-label">Imagen:</label>
        <input type="file" class="form-control" id="upload" name="upload"  required>
    </div>
      <button type="button" id="add-Categoria"class="btn btn-primary">Agregar Categoria</button>
    </form>

</div>

<?php
include("_footer.html");
?>
<script type="text/javascript">
    document.getElementById("add-Categoria").onclick=addCategoria;
</script>