<?php

    require_once("util.php");
    session_start();

    $categoria = htmlspecialchars($_POST["nuevaCategoria"]);
    agregarCategoriaBlog($categoria);

    
?>