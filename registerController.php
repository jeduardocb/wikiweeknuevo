<?php

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

function sqlqry($qry)
{
    $con = conectar_bd();
    if (!$con) {
        return false;
    }
    $result = mysqli_query($con, $qry);
    conectar_bd($con);
    return $result;
}

function cuentaExistente($email)
{
    $q = "  SELECT correo
            FROM usuario
            WHERE correo='$email'";
    return sqlqry($q)->num_rows >= 1;
}
    $email = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $contrasena_repetir = $_POST['contrasena_repetir'];
    //Busca el email en la base de datos, si este existe, detiene la función
    if (cuentaExistente($email)) {
        die("Error: Ya existe un usuario registrado con el correo " . $email);
    }

    if ($contrasena == $contrasena_repetir) {
    $con = conectar_bd();
    //convierte la contraseña a un hash con las medidas de seguridad default actuales (esto cambia con el tiempo)
    $contrasena = password_hash($contrasena, PASSWORD_BCRYPT);
    
        //SQL para insertar un usuario
        $dml = "INSERT INTO usuario (nombre, contrasena, rol, correo)
                VALUES ('$usuario','$contrasena','admin','$email')";
        

        if (mysqli_query($con, $dml)) {
            header('Location: login.php');
            die();
        } else {
            echo "Error: " . $dml . "<br>" . mysqli_error($conn);
        }
    }

?>