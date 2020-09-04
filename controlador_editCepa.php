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
    
    //felengs nombres
    $fn1 = htmlspecialchars($_POST['sn1']);
    $fn2 = htmlspecialchars($_POST['sn2']);
    $fn3 = htmlspecialchars($_POST['sn3']);
    $fn4 = htmlspecialchars($_POST['sn4']);
    $fn5 = htmlspecialchars($_POST['sn5']);
    $felling_nombres = array($fn1, $fn2, $fn3, $fn4, $fn5);
    //felengs porcentajes
    $fp1 = htmlspecialchars($_POST['sp1']);
    $fp2 = htmlspecialchars($_POST['sp2']);
    $fp3 = htmlspecialchars($_POST['sp3']);
    $fp4 = htmlspecialchars($_POST['sp4']);
    $fp5 = htmlspecialchars($_POST['sp5']);
    $felling_porcentajes = array($fp1, $fp2, $fp3, $fp4, $fp5);
    //id sensaciones
    $id_fe1 = htmlspecialchars($_POST['idSensaciones1']);
    $id_fe2 = htmlspecialchars($_POST['idSensaciones2']);
    $id_fe3 = htmlspecialchars($_POST['idSensaciones3']);
    $id_fe4 = htmlspecialchars($_POST['idSensaciones4']);
    $id_fe5 = htmlspecialchars($_POST['idSensaciones5']);
    $felling_ids = array($id_fe1, $id_fe2, $id_fe3, $id_fe4, $id_fe5);
    //ayuda con nombres
    $an1 = htmlspecialchars($_POST['an1']);
    $an2 = htmlspecialchars($_POST['an2']);
    $an3 = htmlspecialchars($_POST['an3']);
    $an4 = htmlspecialchars($_POST['an4']);
    $an5 = htmlspecialchars($_POST['an5']);
    $ayuda_nombres = array($an1, $an2, $an3, $an4, $an5);
    //ayuda con porcentajes
    $ap1 = htmlspecialchars($_POST['ap1']);
    $ap2 = htmlspecialchars($_POST['ap2']);
    $ap3 = htmlspecialchars($_POST['ap3']);
    $ap4 = htmlspecialchars($_POST['ap4']);
    $ap5 = htmlspecialchars($_POST['ap5']);
    $ayuda_porcentajes = array($ap1, $ap2, $ap3, $ap4, $ap5);
    //id ayuda
    $id_ayu1 = htmlspecialchars($_POST['idAyuda1']);
    $id_ayu2 = htmlspecialchars($_POST['idAyuda2']);
    $id_ayu3 = htmlspecialchars($_POST['idAyuda3']);
    $id_ayu4 = htmlspecialchars($_POST['idAyuda4']);
    $id_ayu5 = htmlspecialchars($_POST['idAyuda5']);
    $ayuda_ids = array($id_ayu1, $id_ayu2, $id_ayu3, $id_ayu4, $id_ayu5);
    //negativo nombres
    $nn1 = htmlspecialchars($_POST['nn1']);
    $nn2 = htmlspecialchars($_POST['nn2']);
    $nn3 = htmlspecialchars($_POST['nn3']);
    $nn4 = htmlspecialchars($_POST['nn4']);
    $nn5 = htmlspecialchars($_POST['nn5']);
    $negativo_nombres = array($nn1, $nn2, $nn3, $nn4, $nn5);
    //negativo porcentajes
    $np1 = htmlspecialchars($_POST['np1']);
    $np2 = htmlspecialchars($_POST['np2']);
    $np3 = htmlspecialchars($_POST['np3']);
    $np4 = htmlspecialchars($_POST['np4']);
    $np5 = htmlspecialchars($_POST['np5']);
    $negativo_porcentajes = array($np1, $np2, $np3, $np4, $np5);
    //id negativo
    $id_neg1 = htmlspecialchars($_POST['idNegativo1']);
    $id_neg2 = htmlspecialchars($_POST['idNegativo2']);
    $id_neg3 = htmlspecialchars($_POST['idNegativo3']);
    $id_neg4 = htmlspecialchars($_POST['idNegativo4']);
    $id_neg5 = htmlspecialchars($_POST['idNegativo5']);
    $negativo_ids = array($id_neg1, $id_neg2, $id_neg3, $id_neg4, $id_neg5);

    $dificultad = htmlspecialchars($_POST["dificultad"]);
    $altura = ($_POST["altura"]);
    $rendimiento = htmlspecialchars($_POST["rendimiento"]);
    $florecimiento =($_POST["florecimiento"]);
    $nombres_arch = $nombres;
    $archivos = $_FILES;
    $terpenos = limpia_entradas($_POST["terpenos"]);
    $porcentajes = limpia_entradas($_POST["porcentajes"]);

    ActualizarCepa($nombre, $idweed, $descripcion, $id_categoria, $cbdmin, $cbdmax, $thcmin, $thcmax, $dificultad, $altura, $florecimiento, $rendimiento, $terpenos, $porcentajes, $nombres_arch, $felling_nombres, $felling_porcentajes, $ayuda_nombres, $ayuda_porcentajes, $negativo_nombres, $negativo_porcentajes, $felling_ids, $ayuda_ids, $negativo_ids);
    
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
