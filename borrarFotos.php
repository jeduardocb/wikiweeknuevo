<?php
    require_once("util.php");
    session_start();
    $idFoto = $_POST["idfoto"];
    $idweed = $_POST["idweed"];

    $dml = "DELETE FROM fotos
            WHERE id = $idFoto";
    modifyDb($dml);

    header("Location: ./editCepa.php?idweed=$idweed");

?>