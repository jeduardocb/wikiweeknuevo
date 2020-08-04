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
    $id_categoria = htmlspecialchars($_POST["categoria_blog"]);//te arroga el id de la categoria
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $nombres_arch = $nombres;
    $archivos = $_FILES;
    agregarBlog($id_categoria, $titulo, $descripcion,  $nombres_arch, $archivos);


?>