<?php
    require_once("util.php");
    session_start();
    $idFoto = $_GET["idfoto"];
    $idreceta = $_GET["idreceta"];

    $dml = "DELETE FROM fotos_recetas
            WHERE id = $idFoto";
    modifyDb($dml);

header("Location: edit_receta.php?idreceta=$idreceta");

