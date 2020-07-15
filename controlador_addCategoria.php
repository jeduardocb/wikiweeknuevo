<?php

    require_once("util.php");
    session_start();

    $categoria = htmlspecialchars($_POST["nuevaCategoria"]);
    $descripcion= htmlspecialchars($_POST["descripcionCategoria"]);

    //print_r($categoria);
    $archivo = $_FILES;

    $target_dir = "./images/categoria/";
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["upload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["upload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
    if($uploadOk == 1){
        echo agregarCategoria($categoria,$_FILES["upload"]["name"], $archivo,$target_file,$descripcion);

    }else{
        
    }
    
?>