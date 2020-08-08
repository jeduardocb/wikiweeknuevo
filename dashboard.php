<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>
<div class="container text-center">
    <h1 class="text-center">Panel de Control</h1>
    <a href="addCepa.php"> <button type="button" class="btn btn-info">Agregar Nueva Cepa</button></a>
    <a href="listadoCepa.php"> <button type="button" class="btn btn-info">Modificar Cepas</button></a><br><hr>
    <a href="addTerpeno.php"> <button type="button" class="btn btn-info">Agregar/Modificar Terpenos</button></a><br><hr>
    <a href="addCategoria.php"> <button type="button" class="btn btn-info">Agregar/Modificar Categoria</button></a><br> <hr>
    <a href="agregar_blog.php"> <button type="button" class="btn btn-info">Agregar Blog</button></a>
    <a href="modificar_blog.php"> <button type="button" class="btn btn-info">Modificar Blog</button></a>
    <br> <hr>
    <a href="agregar_receta.php"> <button type="button" class="btn btn-info">Agregar Receta</button></a>
    <a href="agregar_blog.php"> <button type="button" class="btn btn-info">Modificar Recetas</button></a>
</div>

<?php
include("_footer.html");
?>