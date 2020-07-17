<?php

    require_once("util.php");
    session_start();
    $terpeno =  $_POST;
    for( $i=0;$i< (count($terpeno) /2)-1;$i++){
        echo editarTerpenos($terpeno[$i],$terpeno["id".$i]);
    }
   header('location: ./addTerpeno.php');
    
?>