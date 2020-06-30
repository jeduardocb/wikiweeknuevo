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
function limpia_entrada($variable) {
    return $variable = htmlspecialchars($variable);
}
function limpia_entradas($arr){
    foreach($arr as &$key){
        $key = limpia_entrada($key);
    }
    return $arr;
}
function getCategorias(){

	 $con = conectar_bd();

	$sql = "SELECT * FROM categoria";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"] . " - Name: " . $row["nombre"]."<br>";
			echo '<div class="col-md-3">
					<form action="catalogo.php" method="post">
						<input type="hidden" name="idcategoria" value="'.$row["id"].'">
										<input type="image" src="http://placehold.it/250x250" alt="Submit Form" style="max-width:100%;"/>
									<div class="caption">
										<h4>'.$row["nombre"]. '</h4>
										<p>Nullam Condimentum Nibh Etiam Sem</p>
									</div>
						</form>
					</div>';
		}
	} else {
		echo "0 results";
	}

	desconectar_bd($con);
}

function getCepas($idcategoria){
	$con = conectar_bd();

	$sql = "SELECT categoria.id AS catid, weed.id AS wid, weed.descripcion, weed.nombre
			FROM weed
			INNER JOIN categoria
			ON weed.id_categoria = categoria.id
			AND categoria.id = $idcategoria";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"] . " - Name: " . $row["nombre"]."<br>";
			echo '<div class="col-md-4 text-center animate-box">
					<div class="product">
					<form id="formulario" action="single.php" method="get">
						<input type="hidden" name="idweed" value="' . $row["wid"] . '">
						
							<div class="product-grid" style="background-image:url(images/product-1.jpg);">
								<div class="inner">
									<p>
										<a href="single.php" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a id="nombre"  href="javascript:{}" onclick="document.getElementById("formulario").submit();">'.$row["nombre"]. '</a></h3>
							</div>
						</form>
             		</div>
            	</div>';

		}
	} else {
		echo "0 results";
	}

	desconectar_bd($con);
}
     //Crea un select con los datos de una consulta
  //@param $id: Campo en una tabla que contiene el id
  //@param $columna_descripcion: Columna de una tabla con una descripción
  //@param $tabla: La tabla a consultar en la bd
  function crear_select($id, $columna_descripcion, $tabla) {
    $conexion_bd = conectar_bd();  
      
      
    $resultado = '<select class="form-control" name="'.$tabla.'" id="'.$tabla.'"><option value="" disabled selected>Selecciona una opción</option>';
    
            
    $consulta = "SELECT $id  , $columna_descripcion  FROM $tabla";
    $resultados = $conexion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {

      $resultado .= '<option value="'.$row["$id"].'">'.$row["$columna_descripcion"].'</option>';
       
    }
        
    desconectar_bd($conexion_bd);
    $resultado .=  '</select>';
    return $resultado;
  }
   
  function getTerpenos() {
    $conexion_bd = conectar_bd();  
      
      
    $resultado = '';
    
            
    $consulta = "select nombre,id_terpeno from terpenos";
    $resultados = $conexion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
        $resultado .='<div class="checkbox" id="checkterpenos">
      <label><input class="terpenos" type="checkbox" idt="'.$row["id_terpeno"].'"  value="'.$row["id_terpeno"].'">' .$row["nombre"].'</label>
      <input type="number" class="form-control" id="'.$row["id_terpeno"].'" placeholder="5">
    </div>';
     
       
    }
        
    desconectar_bd($conexion_bd);
    return $resultado;
  }

function insertIntoDb($dml, ...$args){
    $conDb =  conectar_bd();
    $types='';
    //Verifica los tipos de variable de los argumentos y termina el proceso si no son int, double, string o BLOB
    foreach ($args as $arg){
        $types.=substr(gettype($arg),0,1);
        if(preg_match('/[^idsb]/', $types)){
            die("Invalid argument, only Int, double, string and BLOB accepted");
        }
    }
    if ( !($statement = $conDb->prepare($dml)) ) {
        die("Error: (" . $conDb->errno . ") " . $conDb->error);
        return 0;
    }
    //Unir los parámetros de la función con los parámetros de la consulta
    //El primer argumento de bind_param es el formato de cada parámetro
    if (!$statement->bind_param($types, ...$args)) {
        die("Error en vinculación: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }
    //Executar la consulta
    if (!$statement->execute()) {
        die("Error en ejecución: (" . $statement->errno . ") " . $statement->error);
        return 0;
    }
    $id = $conDb->insert_id;
    desconectar_bd($conDb);
    return $id;
}
//Función que conecta a la bd, realiza un query y vuelve a cerrar la bd. Recibe el SQL del query y regresa un objeto mysqli result
function sqlqry($qry){
    $con = conectar_bd();
    if(!$con){
        return false;
    }
    $result = mysqli_query($con, $qry);
    desconectar_bd($con);
    return $result;
}
function addCbd($cbdmin,$cbdmax) {
    //Prepara la consulta
    $dml = 'insert into cbd (min,max) values(?,?) ';
    return insertIntoDb($dml,$cbdmin,$cbdmax);
  }
function addThc($thcmin,$thcmax) {
    //Prepara la consulta
    $dml = 'insert into thc (min,max) values(?,?) ';
    return insertIntoDb($dml,$thcmin,$thcmax);
  }
function addCrecimiento($dificultad,$altura,$rendimiento,$florecimiento) {
    //Prepara la consulta
    $dml = 'insert into crecimiento (dificultad,altura,rendimiento,florecimiento) values (?,?,?,?);';
    return insertIntoDb($dml,$dificultad,$altura,$rendimiento,$florecimiento);
  }
function addCepa($category,$nombre,$descripcion) {
    $sql= "select id_crecimiento from crecimiento ORDER BY id_crecimiento DESC LIMIT 1;";
    $crecimiento=mysqli_fetch_assoc(sqlqry($sql));
    $crecimiento=$crecimiento["id_crecimiento"];
    
    $sql= "select id_cbd from cbd ORDER BY id_cbd DESC LIMIT 1;";
    $cbd=mysqli_fetch_assoc(sqlqry($sql));
    $cbd=$cbd["id_cbd"];
    
    $sql= "select id_thc from thc ORDER BY id_thc DESC LIMIT 1;";
    $thc=mysqli_fetch_assoc(sqlqry($sql));
    $thc=$thc["id_thc"];
    
    $dml = 'insert into weed (id_categoria,id_crecimiento,id_cbd,id_thc,nombre,descripcion) values (?,?,?,?,?,?);';
    return insertIntoDb($dml,$category,$crecimiento,$cbd,$thc,$nombre,$descripcion);
  }
function addTerpenos($id_terpeno,$porcentaje){
    $sql= "select id from weed ORDER BY id DESC LIMIT 1;";
    $weed=mysqli_fetch_assoc(sqlqry($sql));
    $weed=$weed["id"];
    
    
    $dml = 'insert into weed_terpenos (id_weed,id_terpeno,porcentaje) values (?,?,?);';
    return insertIntoDb($dml,$weed,$id_terpeno,$porcentaje);
}

?> 