<?php

    require_once("util.php");
    session_start();
    $categoria =  $_POST;
    //var_dump($categoria );
    if(isset($categoria)){
         for( $i=0;$i< (count($categoria)-1)/3;$i++){
        echo editarCategoria($categoria["id".$i],$categoria[$i],$categoria["descripcion".$i]);
    }
    }
   
  if(isset($_GET['id_categoria'])){
      echo eliminarCategoria($_GET['id_categoria']);
  }
    header('location: ./addCategoria.php');
    
?>