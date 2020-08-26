<?php
session_start();
function conectar_bd()
{
    $servername = "mysql1008.mochahost.com";
    $username = "dawbdorg_1704641";
    $password = "1704641";
    $dbname = "dawbdorg_A01704641";
    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("conexion fallida" . mysqli_connect_error());
    }
    return $con;
}
function desconectar_bd($mysql)
{
    mysqli_close($mysql);
}

function sqlqry($qry){
    $con = conectar_bd();
    if (!$con) {
        return false;
    }
    $result = mysqli_query($con, $qry);
    conectar_bd($con);
    return $result;
}

    if ($_POST) {
    $correo = $_POST['correo'];
    $password = $_POST['contrasena'];
    //echo $password;
    //Recupera unicamente el password del usuario para poder verificarlo
    $passQuery = "SELECT contrasena as passHash
                        FROM usuario
                        WHERE correo='$correo'";

    $passHash = sqlqry($passQuery)->fetch_object();

    if ($passHash) {
        $passHash = $passHash->passHash;
    } else {
        $passHash = "";
    }
    echo $password;
    
    //asigna los permisos del usuario a la sesión
    if (password_verify($password, $passHash)) {
        $_SESSION['admin'] = 1;
        header('Location: dashboard.php');
        die();
    } else {
        echo "no jalo";
        //return 0;
    }
}