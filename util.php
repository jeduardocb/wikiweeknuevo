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
      $id = $row["id"];
			//echo "id: " . $row["id"] . " - Name: " . $row["nombre"]."<br>";
			echo '<div class="col-md-3">
					<form id="'.$row["id"].'" action="catalogo.php" method="post">
						<input type="hidden" name="idcategoria" value="'.$row["id"]. '">
                                  <input type="image" src="images/categoria/' .$row["nombre_foto"]. '" alt="Submit Form" style="max-width:100%;" height="250" width="250"/>
									<div class="caption">
										<h4><a href="javascript:{}" onclick="document.getElementById(' . "'$id'" . ').submit();">'.$row["nombre"].'</a></h4>
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

	$sql = "SELECT categoria.id AS catid, weed.id AS wid, weed.descripcion, weed.nombre, fotos.nombre AS foto
          FROM weed
          INNER JOIN categoria
          ON weed.id_categoria = categoria.id
          INNER JOIN fotos
          ON weed.id = fotos.id_weed
          AND categoria.id = $idcategoria";
	$result = $con->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			$idweed = $row["wid"];
			//echo "id: " . $row["id"] . " - Name: " . $row["nombre"]."<br>";
			echo '<div class="col-md-4 text-center animate-box">
					<div class="product">
					<form id="'.$row["wid"].'" action="single.php" method="get">
						<input type="hidden" name="idweed" value="' . $row["wid"] . '">
						
							<div class="product-grid" style="background-image:url(images/cepas/'.$row["foto"]. '">
								<div class="inner">
									<p>
										<a href="javascript:{}" onclick="document.getElementById(' . "'$idweed'" . ').submit();" class="icon"><i class="icon-eye"></i></a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a id="nombre" href="javascript:{}" onclick="document.getElementById('. "'$idweed'".').submit();">'.$row["nombre"]. '</a></h3>
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
    $conion_bd = conectar_bd();  
      
      
    $resultado = '<select class="form-control" name="'.$tabla.'" id="'.$tabla.'"><option value="" disabled selected>Selecciona una opción</option>';
    
            
    $consulta = "SELECT $id  , $columna_descripcion  FROM $tabla";
    $resultados = $conion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {

      $resultado .= '<option value="'.$row["$id"].'">'.$row["$columna_descripcion"].'</option>';
       
    }
        
    desconectar_bd($conion_bd);
    $resultado .=  '</select>';
    return $resultado;
  }
   
  function getTerpenos() {
    $conion_bd = conectar_bd();  
      
      
    $resultado = '';
    
            
    $consulta = "select nombre,id_terpeno from terpenos";
    $resultados = $conion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
        $resultado .= '<div class="checkbox" id="checkterpenos">
      <label>
        <input class="terpenos" type="checkbox" name="terpenos[]" idt="'.$row["id_terpeno"].'"  value="'.$row["id_terpeno"].'">' .$row["nombre"]. '
      </label>
      <input type="number" name="porcentajes[]" class="form-control" id="'.$row["id_terpeno"].'" placeholder="5" min="1" max="100">
    </div>';
     
       
    }
        
    desconectar_bd($conion_bd);
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
//funcion para agregar nuevos terpenos que no existen
function agregarTerpeno($terpeno){
    $dml = 'insert into terpenos (nombre) values (?);';
    return insertIntoDb($dml,$terpeno);
}
function getProgressBar($idweed)
{
  $con = conectar_bd();
  $contador = 0;

  $sql = "SELECT terpenos.id_terpeno, terpenos.nombre, weed_terpenos.porcentaje
  FROM terpenos
  INNER JOIN weed_terpenos
  ON terpenos.id_terpeno = weed_terpenos.id_terpeno WHERE weed_terpenos.id_weed = $idweed
  ORDER BY porcentaje DESC";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      if ($contador == 0) {
        echo '<div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="' . $row["porcentaje"] . '"
                  aria-valuemin="0" aria-valuemax="100" style="width:' . $row["porcentaje"] . '%">
                    ' . $row["nombre"] . '
                  </div>
                </div>';
                
      }elseif ($contador == 1) {
        echo '<div class="progress">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="' . $row["porcentaje"] . '"
                  aria-valuemin="0" aria-valuemax="100" style="width:' . $row["porcentaje"] . '%">
                    ' . $row["nombre"] . '
                  </div>
                </div>';
        } elseif ($contador == 2) {
        echo '<div class="progress">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="' . $row["porcentaje"] . '"
                  aria-valuemin="0" aria-valuemax="100" style="width:' . $row["porcentaje"] . '%">
                    ' . $row["nombre"] . '
                  </div>
                </div>';
          }
      $contador++;
    }

  } else {
    echo "0 results";
  }

  desconectar_bd($con);
}

function getNombreWeed($idweed)
{
  $con = conectar_bd();


  $sql = "SELECT nombre FROM weed WHERE id=$idweed";
  $result = $con->query($sql);
  $nombre = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $nombre["nombre"];
  }

  desconectar_bd($con);
}

function getDescripcionWeed($idweed)
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

function getThc($idweed)
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
      echo $thc["min"] . " - ";
      echo $thc["max"];
    } else {
      if ($thc["min"] < 1) {
        echo "<1";
      } else {
        echo $thc["min"];
      }
    }
  }

  desconectar_bd($con);
}

function getCbd($idweed)
{
  $con = conectar_bd();


  $sql = "SELECT weed.id AS idweed, cbd.id_cbd, cbd.max, cbd.min
    FROM weed
    INNER JOIN cbd
    ON weed.id_cbd = cbd.id_cbd AND id=$idweed";
  $result = $con->query($sql);
  $cbd = mysqli_fetch_assoc($result);
  if ($result->num_rows > 0) {

    if ($cbd["max"] != 0) {
      echo $cbd["min"] . " ";
      echo $cbd["max"];
    } else {
      if ($cbd["min"] < 1) {
        echo "<1";
      }else{
        echo $cbd["min"];
      }
      
    }
  }

  desconectar_bd($con);
}

function getCategoria($idweed)
{
  $con = conectar_bd();


  $sql = "SELECT categoria.nombre, weed.id
  FROM categoria
  INNER JOIN weed
  ON categoria.id = weed.id
  WHERE weed.id=$idweed";
  $result = $con->query($sql);
  $categoria = mysqli_fetch_assoc($result);

  $result = $con->query($sql);
  $categoria = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $categoria["nombre"];
  }

  desconectar_bd($con);
}

function agregarCepa($cbdmin, $cbdmax,$thcmin, $thcmax,$dificultad , $altura, $rendimiento, $florecimiento,$id_categoria, $nombre, $descripcion, $terpenos, $porcentajes, $nombres_arch, $archivos){

    if($cbdmax == ""){
        $cbdmax=0;
    }
    if($thcmax="" == ""){
        $thcmax=0;
    }
     $con = new mysqli("mysql1008.mochahost.com", "dawbdorg_1704641", "1704641", "dawbdorg_A01704641");
  if ($con->connect_errno) {
    printf("Conexión fallida: %s\n", $con->connect_error);
    exit();
  }
  $auxiliar = 0;
  $count = count($porcentajes);
    
  try {
    $con->autocommit(false);
    $con->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    echo "entra al try<br>";
      if (!($con->query("INSERT INTO cbd (min,max) VALUES($cbdmin,$cbdmax)"))) {
      throw new Exception("no jala cbd");
      }
      
      echo "bloque cbd<br>";
      if (!(mysqli_fetch_assoc($con->query("SELECT id_cbd FROM cbd ORDER BY id_cbd DESC LIMIT 1")))) {
        throw new Exception("no jala id_cbd");
      }else{
        $id_cbd = mysqli_fetch_assoc($con->query("SELECT id_cbd FROM cbd ORDER BY id_cbd DESC LIMIT 1"));
        $id_cbd = $id_cbd["id_cbd"];
      }
      
      if (!($con->query("INSERT INTO thc (min,max) VALUES($thcmin,$thcmax)"))) {
        throw new Exception("no jala thc");
      }

    if (!(mysqli_fetch_assoc($con->query("SELECT id_thc FROM thc ORDER BY id_thc DESC LIMIT 1")))) {
      throw new Exception("no jala id_thc");
    } else {
      $id_thc = mysqli_fetch_assoc($con->query("SELECT id_thc FROM thc ORDER BY id_thc DESC LIMIT 1"));
      $id_thc = $id_thc["id_thc"];
    }

    echo "bloque thc<br>";

    if (!($con->query("INSERT INTO crecimiento (dificultad,altura,rendimiento,florecimiento) VALUES ('$dificultad','$altura','$rendimiento','$florecimiento')"))) {
      throw new Exception("no jala crecimiento");
    }

    if (!(mysqli_fetch_assoc($con->query("SELECT id_crecimiento FROM crecimiento ORDER BY id_crecimiento DESC LIMIT 1")))) {
      throw new Exception("no jala id_crecimiento");
    } else {
      $id_crecimiento = mysqli_fetch_assoc($con->query("SELECT id_crecimiento FROM crecimiento ORDER BY id_crecimiento DESC LIMIT 1"));
      $id_crecimiento = $id_crecimiento["id_crecimiento"];
    }

    echo "bloque crecimiento<br>";

    if (!($con->query("INSERT INTO weed (id_categoria,id_crecimiento,id_cbd,id_thc,nombre,descripcion) values ($id_categoria,$id_crecimiento,$id_cbd,$id_thc,'$nombre','$descripcion')"))) {
      throw new Exception("no jala weed");
    }

    if (!(mysqli_fetch_assoc($con->query("SELECT id FROM weed ORDER BY id DESC LIMIT 1")))) {
      throw new Exception("no jala id_weed");
    } else {
      $id_weed = mysqli_fetch_assoc($con->query("SELECT id FROM weed ORDER BY id DESC LIMIT 1"));
      $id_weed = $id_weed["id"];
    }

    echo "bloque weed<br>";

      for ($i = 0; $i < $count; $i++) {
        if ($porcentajes[$i] != '') {
            $ter = $terpenos[$auxiliar];
            $por = $porcentajes[$i];
            if (!($con->query("INSERT INTO weed_terpenos (id_weed, id_terpeno, porcentaje) values ($id_weed, $ter, $por)"))) {
              throw new Exception("no jala weed_terpenos");
            }
            $auxiliar++;
        }
      }

    echo "bloque weed_terpenos<br>";
      for ($i=0; $i < count($nombres_arch); $i++) {
        $newFilePath = "images/cepas/" . $nombres_arch[$i];
        // Check if file already exists
        if (file_exists($newFilePath)) {
          echo "Sorry, file already exists.";
          throw new Exception("no jala ya existe la foto");
        }
        echo $archivos['upload']['name'][$i];
        if (move_uploaded_file($archivos['upload']['tmp_name'][$i], $newFilePath)) {
          if (!($con->query("INSERT INTO fotos (id_weed, nombre) values ($id_weed, '$nombres_arch[$i]')"))) {
            throw new Exception("no jala nombre foto bd");
          }
        }else{
          throw new Exception("no jala subir fotos");
        }
      }
    echo "bloque fotos<br>";
      echo $con->commit() . "<br>";
     echo $con->autocommit(true)."<br>";
      
      $con->close();
      $_SESSION["mensaje"]=true;
      header('location: ./addCepa.php');
    echo "fin commit<br>";
    } catch (Exception $e) {
      $con->rollback();
      $_SESSION["mensaje"]=false;
      header('location: ./addCepa.php');
      //echo 'Something fails: ',  $e->getMessage(), "\n";
    //echo "errror, falio ferga<br>";
  }

}

function getImagenesWeed($idweed)
{

    $con = conectar_bd();
    $bandera = true;
    $contador = 0;
    $sql = "SELECT nombre FROM fotos where id_weed=$idweed";
    $result = $con->query($sql);
    $cadena1 = '<div class="preview-pic tab-content">';
    $cadena2 = '<ul class="preview-thumbnail nav nav-tabs" style="margin-left:15px;">';
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if($bandera){
            $cadena1.= ' <div class="tab-pane active" id="pic-'.$contador.'"><img src="images/cepas/' . $row["nombre"] . '" width="440" height="440" />
								</div>';
        }else{
            $cadena1.= '<div class="tab-pane" id="pic-'.$contador.'"><img src="images/cepas/' . $row["nombre"] . '"  width="440" height="440"/></div>';
        }
        if($bandera){
            $cadena2.= ' <li class="active">
									<a data-target="#pic-'.$contador.'" data-toggle="tab">
										<img img src="images/cepas/' . $row["nombre"] . '" width="122" height="122 " />
									</a>
								</li>';
            $bandera=false;
        }else{
            $cadena2.= '<li><a data-target="#pic-'.$contador.'" data-toggle="tab"><img src="images/cepas/' . $row["nombre"] . '" width="122" height="122" /></a>
								</li>';
        }
        $contador++;
        	

  } 

 
  }else{
      echo "No hay imagenes";
  }
    $cadena1.='</div>';
    $cadena2.='</ul>';
    return $cadena1.$cadena2;

 desconectar_bd($con);
}
function agregarCategoria($categoria,$nombre_foto,$archivo,$target_file){
  $con = new mysqli("mysql1008.mochahost.com", "dawbdorg_1704641", "1704641", "dawbdorg_A01704641");
  if ($con->connect_errno) {
    printf("Conexión fallida: %s\n", $con->connect_error);
    exit();
  }
  try {
    $con->autocommit(false);
    $con->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    echo "entra al try<br>";
      if (!($con->query("INSERT INTO categoria (nombre,nombre_foto) VALUES ('$categoria' ,'$nombre_foto')"))) {
        throw new Exception("No se pudo insertar la categoria");
      }
     
      

      if (move_uploaded_file($archivo["upload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $archivo["upload"]["name"]). " has been uploaded.";
      } else {
          throw new Exception("Sorry, there was an error uploading your file.");
      }
    
      
      
     $con->commit() . "<br>";
      $con->autocommit(true)."<br>";
      
      $con->close();
      $_SESSION["mensaje"]=true;
      header('location: ./addCategoria.php');
      echo "fin commit<br>";
    } catch (Exception $e) {
      $con->rollback();
      $_SESSION["mensaje"]=false;
      header('location: ./addCategoria.php');
      echo 'Something fails: ',  $e->getMessage(), "\n";
    //echo "errror, falio ferga<br>";
  }

}

function cortarDescripcion($text, $maxchar, $end = '...')
{
  if (strlen($text) > $maxchar || $text == '') {
    $words = preg_split('/\s/', $text);
    $output = '';
    $i      = 0;
    while (1) {
      $length = strlen($output) + strlen($words[$i]);
      if ($length > $maxchar) {
        break;
      } else {
        $output .= " " . $words[$i];
        ++$i;
      }
    }
    $output .= $end;
  } else {
    $output = $text;
  }
  return $output;
}

function getCepaCarrusel(){

  $con = conectar_bd();
  $sql = "SELECT weed.nombre AS weedNombre, weed.id AS weedId, weed.descripcion, categoria.nombre AS catNombre
          FROM weed, categoria
          WHERE weed.id_categoria = categoria.id
          ORDER BY RAND ( ) LIMIT 5";
  $result = $con->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo '<li style="background-image: url(images/fondo4.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                  <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                    <div class="slider-text-inner">
                      <div class="desc">
                        <span class="price">'.$row["catNombre"].'</span>
                        <h2 class="text-center">'.$row["weedNombre"]. '</h2>
                        <p class="text-justify">'. cortarDescripcion($row["descripcion"], 550). '</p>
                        <div class="row">';
                          $sql2 = "SELECT fotos.nombre AS fotoNombre FROM fotos, weed WHERE fotos.id_weed = ". $row["weedId"] ." LIMIT 2";
                          $result2 = $con->query($sql2);
                          if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                              echo '<div class="col-md-4 text-center">
                                      <img src="images/cepas/'.$row2["fotoNombre"].'"/>
                                    </div>';
                            }
                          }
                    echo '<div class="col-md-4 text-center" style="display: inline-block; vertical-align: middle; float: none;">
                            <p><a href="single.php?idweed='. $row["weedId"]. ' " class="btn btn-primary btn-outline btn-lg">ver</a></p>                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>';
      }
  }
  desconectar_bd($con);
}

function getCepasDestacadas(){

  $con = conectar_bd();
  $sql = "SELECT weed.nombre AS weedNombre, weed.id AS weedId, weed.descripcion, categoria.nombre AS catNombre
          FROM weed, categoria
          WHERE weed.id_categoria = categoria.id
          ORDER BY RAND ( ) LIMIT 6";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<div class="col-md-4 text-center animate-box">
				      <div class="product">';
      $sql2 = "SELECT fotos.nombre AS fotoNombre FROM fotos, weed WHERE fotos.id_weed = " . $row["weedId"] . " LIMIT 1";
      $result2 = $con->query($sql2);
      if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
          echo '<div class="product-grid" style="background-image:url(images/cepas/'.$row2["fotoNombre"].'">';
        }
      }
      echo '<div class="inner">
							<p>
								<a href="single.html" class="icon"><i class="icon-eye"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">'.$row["weedNombre"]. '</a></h3>
						<span class="price">' . $row["catNombre"] . '</span>
					</div>
				</div>
			</div>';
    }
  }
  desconectar_bd($con);
}

function getNombreCategoria($idcategoria){
  $con = conectar_bd();
  $sql = "SELECT * FROM categoria WHERE categoria.id = $idcategoria";
  $result = $con->query($sql);
  $categoria = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo 
    "<h2>". $categoria["nombre"]."</h2>
                <p>" . $categoria["descripcion"]."</p>";
  }

  desconectar_bd($con);
}

function getListadoCepas(){
  $con = conectar_bd();
  $sql = "SELECT weed.nombre AS weedNombre, weed.id AS weedId, fotos.nombre
          FROM weed, fotos
          WHERE weed.id = fotos.id_weed;";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="nomargin">'.$row['weedNombre'].'</h4>
                        </div>
                        <div class="col-sm-6 hidden-xs">
                          <img src="images/cepas/'.$row["nombre"].'" style="with: 20px;" class="img-responsive" />
                        </div>
                    </div>
                </td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm"><i class="fas fa-wrench"></i></button>
                    <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
            </tr>';
    }
  }
  desconectar_bd($con);
}

?> 