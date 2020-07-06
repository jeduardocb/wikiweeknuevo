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

function descripcion($idweed)
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

function thc($idweed)
{
    $con = conectar_bd();


    $sql = "SELECT weed.id AS idweed, thc.id_thc, thc.max, thc.min
    FROM weed
    INNER JOIN thc
    ON weed.id_thc = thc.id_thc AND id=$idweed";
    $result = $con->query($sql);
    $thc = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
        if ($thc["max"] != 0) {
            echo $thc["max"]." - ";
            echo $thc["min"];
        }else{
            echo $thc["min"];
        }
    }

    desconectar_bd($con);
}

function cbd($idweed)
{
    $con = conectar_bd();


    $sql = "SELECT weed.id AS idweed, cbd.id_cbd, cbd.max, cbd.min
    FROM weed
    INNER JOIN cbd
    ON weed.id_thc = cbd.id_cbd AND id=$idweed";
    $result = $con->query($sql);
    $cbd = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {

        if ($cbd["max"] != 0) {
            echo $cbd["max"] . " ";
            echo $cbd["min"];
        } else {
            echo $cbd["min"];
        }

    }

    desconectar_bd($con);
}