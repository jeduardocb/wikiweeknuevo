<?php

    require_once("util.php");
    session_start();

    $terpeno = htmlspecialchars($_POST["terpeno"]);
    echo agregarTerpeno($terpeno);

?>