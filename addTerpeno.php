<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>
<div class="container">
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