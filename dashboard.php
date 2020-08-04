<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>
<div class="container text-center">
    <h1 class="text-center">Panel de Control</h1>
    <a href="addCepa.php"> <button type="button" class="btn btn-info">Agregar Nueva Cepa</button></a>
    <a href="addTerpeno.php"> <button type="button" class="btn btn-info">Agregar Terpeno</button></a>
    <a href="addCategoria.php"> <button type="button" class="btn btn-info">Agregar Categoria</button></a>
    <a href="listadoCepa.php"> <button type="button" class="btn btn-info">Modificar Cepas</button></a>
    <a href="agregar_blog.php"> <button type="button" class="btn btn-info">Agregar Blog</button></a>
</div>

<?php
include("_footer.html");
?>