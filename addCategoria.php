<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>
<div class="container">
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Nombre de la Nueva Categoria:</label>
        <input type="text" class="form-control" id="nuevaCategoria" aria-describedby="emailHelp" placeholder="Hibrido">
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