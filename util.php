<?php  
	function conectar_bd(){
    $servername = "mysql1008.mochahost.com";
		$username = "dawbdorg_1704641";
		$password = "1704641";
		$dbname = "dawbdorg_A01704641";
		$con = mysqli_connect($servername,$username,$password,$dbname);
      
		if(!$con){
			die("conexion fallida" .mysqli_connect_error());
		}
		return $con;
	}
function desconectar_bd($mysql){
		mysqli_close($mysql);
	}


    
   

?> 