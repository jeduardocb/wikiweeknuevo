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

        $directorio = 'images/recetas/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

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
            "El archivo $filename se ha almacenado en forma exitosa.<br>";
        } else {
            "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
        closedir($dir); //Cerramos el directorio de destino
    }
    $i++;
}

$titulo = htmlspecialchars($_POST["titulo"]);
$idReceta = htmlspecialchars($_POST["idReceta"]);
$subtitulo = htmlspecialchars($_POST["subtitulo"]);
$descripcion = htmlspecialchars($_POST["descripcion"]);
$descripcion2 = htmlspecialchars($_POST["descripcion2"]);
$id_categoria = htmlspecialchars($_POST["categoria_recetas"]); //te arroga el id de la categoria

$nombres_arch = $nombres;
$archivos = $_FILES;

ActualizarReceta($titulo, $subtitulo, $idReceta, $descripcion, $descripcion2, $id_categoria, $nombres_arch);

/*addCbd($cbdmin,$cbdmax);
    addThc($thcmin,$thcmax);
    addCrecimiento($dificultad,$altura,$rendimiento,$florecimiento);
    addCepa($category,$nombre,$descripcion);
    $count = count($terpenos);
    for ($i = 0; $i < $count; $i++) {
        "Terpeno: ".$terpenos[$i]."<br> Porcentaje: ".$porcentajes[$i] . "<br>";
    }*/

header("Location: ./edit_receta.php?idreceta=$idReceta");
    //die();
