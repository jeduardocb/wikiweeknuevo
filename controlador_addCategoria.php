<?php

    require_once("util.php");
    session_start();

    $categoria = htmlspecialchars($_POST["categoria"]);
    echo agregarCategoria($categoria);

?>