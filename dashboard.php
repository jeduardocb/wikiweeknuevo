<?php
session_start();
if(isset($_SESSION['admin'])):
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>
<div class="container text-center">
    <h1 class="text-center">Panel de Control</h1>
    <a href="addCepa.php"> <button type="button" class="btn btn-info">Agregar Nueva Cepa</button></a>
    <a href="listadoCepa.php"> <button type="button" class="btn btn-info">Modificar Cepas</button></a>
    
    <a href="addTerpeno.php"> <button type="button" class="btn btn-info">Agregar/Modificar Terpenos</button></a>
    
    <a href="addCategoria.php"> <button type="button" class="btn btn-info">Agregar/Modificar Categoria</button></a><br>
    <hr>
    <a href="agregar_blog.php"> <button type="button" class="btn btn-info">Agregar Blog</button></a>
    <a href="modificar_blog.php"> <button type="button" class="btn btn-info">Modificar Blog</button></a>
    <a href="agregar_categoria_blog.php"> <button type="button" class="btn btn-info">Agregar Categoria Blog</button></a>
    <br>
    <hr>
    <a href="agregar_receta.php"> <button type="button" class="btn btn-info">Agregar Receta</button></a>
    <a href="modificar_receta.php"> <button type="button" class="btn btn-info">Modificar Recetas</button></a>
    <a href="modificar_blog.php"> <button type="button" class="btn btn-info">Agregar Categoria Recetas</button></a>
</div>

<?php
include("_footer.html");
else:
    http_response_code(404);
endif;
?>