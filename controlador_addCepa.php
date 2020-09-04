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

    $dificultad = htmlspecialchars($_POST["dificultad"]);
    $altura = ($_POST["altura"]);
    $rendimiento = htmlspecialchars($_POST["rendimiento"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $florecimiento =($_POST["florecimiento"]);
    $terpenos = limpia_entradas($_POST["terpenos"]);
    $porcentajes = limpia_entradas($_POST["porcentajes"]);
    $nombres_arch = $nombres;
    $archivos = $_FILES;

    agregarCepa($cbdmin, $cbdmax,$thcmin, $thcmax,$dificultad, $altura, $rendimiento, $florecimiento,$id_categoria, $nombre, $descripcion, $terpenos, $porcentajes, $nombres_arch, $archivos, $felling_nombres, $felling_porcentajes, $ayuda_nombres, $ayuda_porcentajes, $negativo_nombres, $negativo_porcentajes);


    
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