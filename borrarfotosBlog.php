<?php
require_once("util.php");
session_start();
$idFoto = $_GET["idfoto"];
$idblog = $_GET["idblog"];

$dml = "DELETE FROM fotos_blog
            WHERE id = $idFoto";
modifyDb($dml);

header("Location: editBlog.php?idblog=$idblog");
