<?php

    require_once("util.php");
    session_start();

    $nombre = "";
    $nombres = [];
    $auxiliar = 0;
    $i = 0;


//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
  //Validamos que el archivo exista
  if ($_FILES["archivo"]["name"][$key]) {
    $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
    $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

    $directorio = 'images/cepas/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

    //Validamos si la ruta de destino existe, en caso de no existir la creamos
    if (!file_exists($directorio)) {
      mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
    }

    $dir = opendir($directorio); //Abrimos el directorio de destino
    $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo

    //Movemos y validamos que el archivo se haya cargado correctamente
    //El primer campo es el origen y el segundo el destino
    $nombre =  $_FILES['archivo']['name'][$i];
    $nombres[$i] = $nombre;
    if (move_uploaded_file($source, $target_path)) {
      echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
    } else {
      echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
    }
    closedir($dir); //Cerramos el directorio de destino
  }
  $i++;
}

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
    $florecimiento =($_POST["florecimiento"]);
    $nombres_arch = $nombres;
    $archivos = $_FILES;
    $terpenos = limpia_entradas($_POST["terpenos"]);
    $porcentajes = limpia_entradas($_POST["porcentajes"]);

    ActualizarCepa($nombre, $idweed, $descripcion, $id_categoria, $cbdmin, $cbdmax, $thcmin, $thcmax, $dificultad, $altura, $florecimiento, $rendimiento, $terpenos, $porcentajes, $nombres_arch);
    
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
