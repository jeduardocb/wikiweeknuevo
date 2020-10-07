<?php

    require_once("util.php");
    session_start();

    $nombre = "";
    $nombres = [];
    
    var_dump($_FILES);

    $files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

    // Count # of uploaded files in array
    $total = count($_FILES['upload']['name']);
    
    // Loop through each file
    for($i=0 ; $i < $total ; $i++ ) {
      $nombre =  $_FILES['upload']['name'][$i];
      $nombres[$i] = $nombre;
      //Get the temp file path
      $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
    }

    $titulo = htmlspecialchars($_POST["titulo"]);
    $id_categoria = htmlspecialchars($_POST["categoria_recetas"]);//te arroga el id de la categoria
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $subtitulo = htmlspecialchars($_POST["subtitulo"]);
    $descripcionsubtitulo = htmlspecialchars($_POST["descripcionsubtitulo"]);
    $ingredientes = htmlspecialchars($_POST["ingredientes"]);
    $tiempo = htmlspecialchars($_POST["tiempo"]);
    $nombres_arch = $nombres;
    $archivos = $_FILES;

    if(count($_FILES['upload']['name'])>2){
      $_SESSION["mensaje"] = false;
      //header('location: ./agregar_receta.php');
    }else {
      agregarReceta($id_categoria, $titulo, $descripcion,  $nombres_arch, $archivos, $subtitulo, $descripcionsubtitulo, $ingredientes,$tiempo);
    }
    


?>