<?php

    require_once("util.php");
    session_start();

   $nombre = htmlspecialchars($_POST["nombre"]);
   $category = htmlspecialchars($_POST["category"]);//te arroga el id de la categoria
   $cbdmax =htmlspecialchars($_POST["cbdmax"]);
   $cbdmin= htmlspecialchars($_POST["cbdmin"]);
   $thcmin = htmlspecialchars($_POST["thcmin"]);
   $thcmax = htmlspecialchars($_POST["thcmax"]);
   $dificultad = htmlspecialchars($_POST["dificultad"]);
   $altura = htmlspecialchars($_POST["altura"]);
   $rendimiento = htmlspecialchars($_POST["rendimiento"]);
   $florecimiento =htmlspecialchars($_POST["florecimiento"]);
   $terpenos = limpia_entradas($_POST["terpenos"]);
    foreach ($terpenos as &$valor) {
        echo $valor;
    }
    

?>