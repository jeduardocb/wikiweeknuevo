<?php

    require_once("util.php");
    session_start();

    $nombre = "";
    $nombres = [];
    

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

    $nombre = htmlspecialchars($_POST["name"]);
    $id_categoria = htmlspecialchars($_POST["categoria"]);//te arroga el id de la categoria
    $cbdmax =htmlspecialchars($_POST["cbdmax"]);
    $cbdmin= htmlspecialchars($_POST["cbdmin"]);
    $thcmin = htmlspecialchars($_POST["thcmin"]);
    $thcmax = htmlspecialchars($_POST["thcmax"]);
    $dificultad = htmlspecialchars($_POST["dificultad"]);
    $altura = ($_POST["altura"]);
    $rendimiento = htmlspecialchars($_POST["rendimiento"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $florecimiento =($_POST["florecimiento"]);
    $terpenos = limpia_entradas($_POST["terpenos"]);
    $porcentajes = limpia_entradas($_POST["porcentajes"]);
    $nombres_arch = $nombres;
    $archivos = $_FILES;

    agregarCepa($cbdmin, $cbdmax,$thcmin, $thcmax,$dificultad, $altura, $rendimiento, $florecimiento,$id_categoria, $nombre, $descripcion, $terpenos, $porcentajes, $nombres_arch, $archivos);


    
    /*for ($i = 0; $i < $count; $i++) {
        
        if ($porcentajes[$i] != '') {
            $terpenos[$auxiliar];
            $porcentajes[$i];
            $auxiliar++;
           echo agrgar(´false);
        }
    }
    addCbd($cbdmin,$cbdmax);
    addThc($thcmin,$thcmax);
    addCrecimiento($dificultad,$altura,$rendimiento,$florecimiento);
    echo addCepa($category,$nombre,$descripcion);
    $count = count($terpenos);
    for ($i = 0; $i < $count; $i++) {
        echo addTerpenos($terpenos[$i],$porcentajes[$i]);
    }*/

   // header("Location: ./addcepa.php");
    //die();


?>