<?php
require_once("util.php");
session_start();

$idweed = $_GET["idweed"];

echo $idweed;

$dml = "UPDATE weed SET estado= 0 WHERE id = $idweed";

if (modifyDb($dml) != 0) {
    echo "se ejecuto";
}

header("Location: ./listadoCepa.php");
?>