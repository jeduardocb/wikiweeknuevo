<?php

    require_once("util.php");
    session_start();

    $nombre = "";
    $nombres = [];
    $auxiliar = 0;
    

    /*$files = array_filter($_FILES['upload']['name']); 

    $total = count($_FILES['upload']['name']);

    for($i=0 ; $i < $total ; $i++ ) {
      $nombre =  $_FILES['upload']['name'][$i];
      $nombres[$i] = $nombre;

      $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
    }*/

    $nombre = htmlspecialchars($_POST["name"]);
    $idweed = htmlspecialchars($_POST["idWeed"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $id_categoria = htmlspecialchars($_POST["categoria"]);//te arroga el id de la categoria
    $cbdmin= htmlspecialchars($_POST["cbdmin"]);
    $thcmin = htmlspecialchars($_POST["thcmin"]);
    $cbdmax =htmlspecialchars($_POST["cbdmax"]);
    $thcmax = htmlspecialchars($_POST["thcmax"]);
    $dificultad = htmlspecialchars($_POST["dificultad"]);
    $altura = ($_POST["altura"]);
    $rendimiento = htmlspecialchars($_POST["rendimiento"]);
    $florecimiento =($_POST["florecimiento"]) . "<br>" ;
    //$nombres_arch = $nombres;
    //$archivos = $_FILES;
    $terpenos = limpia_entradas($_POST["terpenos"]);
    $porcentajes = limpia_entradas($_POST["porcentajes"]);

    ActualizarCepa($nombre, $idweed, $descripcion, $id_categoria, $cbdmin, $cbdmax, $thcmin, $thcmax, $dificultad, $altura, $florecimiento, $rendimiento, $terpenos, $porcentajes);


    
    /*addCbd($cbdmin,$cbdmax);
    addThc($thcmin,$thcmax);
    addCrecimiento($dificultad,$altura,$rendimiento,$florecimiento);
    echo addCepa($category,$nombre,$descripcion);
    $count = count($terpenos);
    for ($i = 0; $i < $count; $i++) {
        echo "Terpeno: ".$terpenos[$i]."<br> Porcentaje: ".$porcentajes[$i] . "<br>";
    }*/

   header("Location: ./editCepa.php?idweed=$idweed");
    //die();
