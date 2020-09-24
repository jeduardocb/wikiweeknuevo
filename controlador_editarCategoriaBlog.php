<?php

    require_once("util.php");
    session_start();
    $categoria =  $_POST;
    if(isset($categoria)){
         for( $i=0;$i< (count($categoria)-1)/3;$i++){
        echo editarCategoriaBlog($categoria["id".$i],$categoria[$i]);
    }
    } 
var_dump($_POST);
  if(isset($_GET['id_categoria'])){
      echo eliminarCategoriaBlog($_GET['id_categoria']);
  }
   header('location: ./agregar_categoria_blog.php');
    
?>