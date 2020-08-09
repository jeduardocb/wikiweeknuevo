<?php
require_once("util.php");
session_start();

$idReceta = $_GET["idreceta"];

    $dml = "UPDATE recetas SET estado= 0 WHERE id = $idReceta";

    if (modifyDb($dml) != 0) {
        echo "se ejecuto";


    header("Location: ./modificar_receta.php");
}
