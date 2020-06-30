<?php
include_once("util.php");

function nombre($idweed){
    $con = conectar_bd();


    $sql = "SELECT nombre FROM weed WHERE id=$idweed";
    $result = $con->query($sql);
    $nombre = mysqli_fetch_assoc($result); 

    if ($result->num_rows > 0) {
        echo $nombre["nombre"];

    }

    desconectar_bd($con);
}

function descipcion($idweed)
{
    $con = conectar_bd();


    $sql = "SELECT descripcion FROM weed WHERE id=$idweed";
    $result = $con->query($sql);
    $descripcion = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
        echo $descripcion["descripcion"];
    }

    desconectar_bd($con);
}