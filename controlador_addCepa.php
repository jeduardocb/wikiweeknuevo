<?php

    require_once("util.php");
    session_start();

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        die();
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    die();
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    die();
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "ico"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    die();
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    die();
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        die();
    }
}

    $nombre = htmlspecialchars($_POST["name"]);
    $category = htmlspecialchars($_POST["categoria"]);//te arroga el id de la categoria
    $cbdmax =htmlspecialchars($_POST["cbdmax"]);
    $cbdmin= htmlspecialchars($_POST["cbdmin"]);
    $thcmin = htmlspecialchars($_POST["thcmin"]);
    $thcmax = htmlspecialchars($_POST["thcmax"]);
    $dificultad = htmlspecialchars($_POST["dificultad"]);
    $altura = ($_POST["altura"]);
    $rendimiento = htmlspecialchars($_POST["rendimiento"]);
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $florecimiento =($_POST["florecimiento"]);
    $terpenos = limpia_entradas($_POST["terpenos"]);
    $porcentajes = limpia_entradas($_POST["porcentajes"]);
    $count = count($porcentajes);
    $auxiliar = 0;
    for ($i = 0; $i < $count; $i++) {
        
        if ($porcentajes[$i] != '') {
            $terpenos[$auxiliar];
            $porcentajes[$i];
            $auxiliar++;
        }
    }
/*addCbd($cbdmin,$cbdmax);
    addThc($thcmin,$thcmax);
    addCrecimiento($dificultad,$altura,$rendimiento,$florecimiento);
    echo addCepa($category,$nombre,$descripcion);
    $count = count($terpenos);
    for ($i = 0; $i < $count; $i++) {
        echo addTerpenos($terpenos[$i],$porcentajes[$i]);
    }*/

header("Location: ./addcepa.php");
die();

?>