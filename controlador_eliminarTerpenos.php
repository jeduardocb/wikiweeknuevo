<?php

    require_once("util.php");
    session_start();
    $idterpeno =  $_GET["id_terpeno"];
    echo eliminarTerpeno($idterpeno);
    header('location: ./addTerpeno.php');
    
?>