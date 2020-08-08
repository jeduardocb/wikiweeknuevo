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

    $directorio = 'images/blog/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

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

    $titulo = htmlspecialchars($_POST["titulo"]);
    $idBlog = htmlspecialchars($_POST["idBlog"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $id_categoria = htmlspecialchars($_POST["categoria_blog"]);//te arroga el id de la categoria
    $subtitulo= htmlspecialchars($_POST["subtitulo"]);
    $descripcionsubtitulo = htmlspecialchars($_POST["descripcionsubtitulo"]);
 
    $nombres_arch = $nombres;
    $archivos = $_FILES;
  

   ActualizarBlog($id_categoria,$titulo,$idBlog,$descripcion,$subtitulo,$descripcionsubtitulo,$nombres_arch);
    
    /*addCbd($cbdmin,$cbdmax);
    addThc($thcmin,$thcmax);
    addCrecimiento($dificultad,$altura,$rendimiento,$florecimiento);
    echo addCepa($category,$nombre,$descripcion);
    $count = count($terpenos);
    for ($i = 0; $i < $count; $i++) {
        echo "Terpeno: ".$terpenos[$i]."<br> Porcentaje: ".$porcentajes[$i] . "<br>";
    }*/

   header("Location: ./editBlog.php?idblog=$idBlog");