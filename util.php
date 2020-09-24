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
function limpia_entrada($variable)
{
  return $variable = htmlspecialchars($variable);
}
function limpia_entradas($arr)
{
  foreach ($arr as &$key) {
    $key = limpia_entrada($key);
  }
  return $arr;
}
function modifyDb($dml)
{
  $conDb = conectar_bd();

  $conDb->query($dml);
  $res = mysqli_affected_rows($conDb);

  desconectar_bd($conDb);
  return $res;
}

function getCategorias()
{

  $con = conectar_bd();

  $sql = "SELECT * FROM categoria";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $id = $row["id"];
      //echo "id: " . $row["id"] . " - Name: " . $row["nombre"]."<br>";
      /*echo '
            <div class="product-card">
              <div class="product-tumb">
                <form id="'.$row["id"].'" action="catalogo.php" method="post">
                  <input type="hidden" name="idcategoria" value="'.$row["id"]. '">
                        <input type="image" src="images/categoria/' .$row["nombre_foto"]. '" alt="Submit Form" style="max-width:100%;" height="250" width="250"/>                     
              </div>
                        <div class="product-details">
                          <h4><a href="javascript:{}" onclick="document.getElementById(' . "'$id'" . ').submit();">'.$row["nombre"].'</a></h4>
                        </div>
                  </form>
              </div>';*/
      echo '
      <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card bg-dark text-white border-0 mt-4 mt-xl-5">
                <img src="images/categoria/' . $row["nombre_foto"] . '" class="card-img" alt="Híbrida">
                <div class="card-img-overlay">
                    <h3 class="card-title"><a href="catalogo.php?idcategoria=' . $row["id"] . '" title="' . $row["nombre"] . '" class="stretched-link text-white">' . $row["nombre"] . '</a></h3>
                </div>
            </div>
        </div>
      ';
    }
  } else {
    echo "0 results";
  }

  desconectar_bd($con);
}

function getCepas($idcategoria)
{
  $con = conectar_bd();

  $sql = "SELECT categoria.id AS catid, weed.id AS wid, weed.descripcion, weed.nombre AS weedNombre
          FROM weed
          INNER JOIN categoria
          ON weed.id_categoria = categoria.id
          AND categoria.id = $idcategoria";
  $result = $con->query($sql);
  $nombre = "";
  $bandera = true;
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $idweed = $row["wid"];
      $idnumerico = intval($idweed);
      $sql1 = "SELECT nombre FROM fotos WHERE id_weed=$idnumerico";
      $result1 = $con->query($sql1);
      while (($row1 = $result1->fetch_assoc()) && $bandera) {
        $nombre = $row1["nombre"];
        // print_r(strlen($nombre));
        for ($i = 0; $i < strlen($nombre); $i++) {
          if ($nombre[$i] == "1") {
            $bandera = false;
          }
        }
      }
      $bandera = true;

      echo '
          <div class="col-md-6 col-lg-3">
              <div class="bg-white shadow text-center pt-2 pt-sm-4 pb-2 pb-sm-4 mb-4">
                  <p><img src="images/cepas/' . $nombre . '" alt="Weed" class="img-fluid"></p>
                  
                  <h4><a href="single.php?idweed=' . $idweed . '" title="' . $row['weedNombre'] . '" class="text-dark">' . $row['weedNombre'] . '</a></h4>
              </div>
          </div>
          ';
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
function crear_select($id, $columna_descripcion, $tabla)
{
  $conion_bd = conectar_bd();


  $resultado = '<select class="form-control" name="' . $tabla . '" id="' . $tabla . '"><option value="" disabled selected>Selecciona una opción</option>';


  $consulta = "SELECT $id  , $columna_descripcion  FROM $tabla";
  $resultados = $conion_bd->query($consulta);
  while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {

    $resultado .= '<option value="' . $row["$id"] . '">' . $row["$columna_descripcion"] . '</option>';
  }

  desconectar_bd($conion_bd);
  $resultado .=  '</select>';
  return $resultado;
}

function getTerpenos()
{
  $conion_bd = conectar_bd();


  $resultado = '';


  $consulta = "select nombre,id_terpeno from terpenos";
  $resultados = $conion_bd->query($consulta);
  while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {
    $resultado .= '<div class="checkbox" id="checkterpenos">
      <label>
        <input class="terpenos" type="checkbox" name="terpenos[]" idt="' . $row["id_terpeno"] . '"  value="' . $row["id_terpeno"] . '">' . $row["nombre"] . '
      </label>
      <input type="number" name="porcentajes[]" class="form-control" id="' . $row["id_terpeno"] . '" placeholder="5" min="1" max="100">
    </div>';
  }

  desconectar_bd($conion_bd);
  return $resultado;
}

function insertIntoDb($dml, ...$args)
{
  $conDb =  conectar_bd();
  $types = '';
  //Verifica los tipos de variable de los argumentos y termina el proceso si no son int, double, string o BLOB
  foreach ($args as $arg) {
    $types .= substr(gettype($arg), 0, 1);
    if (preg_match('/[^idsb]/', $types)) {
      die("Invalid argument, only Int, double, string and BLOB accepted");
    }
  }
  if (!($statement = $conDb->prepare($dml))) {
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
function sqlqry($qry)
{
  $con = conectar_bd();
  if (!$con) {
    return false;
  }
  $result = mysqli_query($con, $qry);
  desconectar_bd($con);
  return $result;
}
//funcion para agregar nuevos terpenos que no existen
function agregarTerpeno($terpeno)
{
  $dml = 'insert into terpenos (nombre) values (?);';
  return insertIntoDb($dml, $terpeno);
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
      } elseif ($contador == 1) {
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
      echo $cbd["min"] . " - ";
      echo $cbd["max"];
    } else {
      if ($cbd["min"] < 1) {
        echo "<1";
      } else {
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

function agregarCepa($cbdmin, $cbdmax, $thcmin, $thcmax, $dificultad, $altura, $rendimiento, $florecimiento, $id_categoria, $nombre, $descripcion, $terpenos, $porcentajes, $nombres_arch, $archivos, $felling_nombres, $felling_porcentajes, $ayuda_nombres, $ayuda_porcentajes, $negativo_nombres, $negativo_porcentajes)
{

  if ($cbdmax == "") {
    $cbdmax = 0;
  }
  if ($thcmax == "") {
    $thcmax = 0;
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
    } else {
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

    if (!($con->query("INSERT INTO weed (id_categoria,id_crecimiento,id_cbd,id_thc,nombre,descripcion, estado) values ($id_categoria,$id_crecimiento,$id_cbd,$id_thc,'$nombre','$descripcion', 1)"))) {
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
    for ($i = 0; $i < count($nombres_arch); $i++) {
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
      } else {
        throw new Exception("no jala subir fotos");
      }
    }
    echo "bloque fotos<br>";
    for ($i = 0; $i < count($felling_nombres); $i++) {
      if (!($con->query("INSERT INTO efectos (id_weed, tipo, nombre, porcentaje) values ($id_weed, 1, '$felling_nombres[$i]', $felling_porcentajes[$i])"))) {
        throw new Exception("no jala efectos sensaciones");
      }
    }
    for ($i = 0; $i < count($ayuda_nombres); $i++) {
      if (!($con->query("INSERT INTO efectos (id_weed, tipo, nombre, porcentaje) values ($id_weed, 2, '$ayuda_nombres[$i]', $ayuda_porcentajes[$i])"))) {
        throw new Exception("no jala efectos ayuda");
      }
    }
    for ($i = 0; $i < count($negativo_nombres); $i++) {
      if (!($con->query("INSERT INTO efectos (id_weed, tipo, nombre, porcentaje) values ($id_weed, 3, '$negativo_nombres[$i]', $negativo_porcentajes[$i])"))) {
        throw new Exception("no jala efectos negativo");
      }
    }
    echo $con->commit() . "<br>";
    echo $con->autocommit(true) . "<br>";


    $_SESSION["mensaje"] = true;
    header('location: ./addCepa.php');
    echo "fin commit<br>";
  } catch (Exception $e) {
    $con->rollback();
    $_SESSION["mensaje"] = false;
    header('location: ./addCepa.php');
    echo 'Something fails: ',  $e->getMessage(), "\n";
    //echo "errror, falio ferga<br>";
  }
  $con->close();
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
      if ($bandera) {
        $cadena1 .= ' <div class="tab-pane active" id="pic-' . $contador . '"><img src="images/cepas/' . $row["nombre"] . '" width="440" height="440" />
								</div>';
      } else {
        $cadena1 .= '<div class="tab-pane" id="pic-' . $contador . '"><img src="images/cepas/' . $row["nombre"] . '"  width="440" height="440"/></div>';
      }
      if ($bandera) {
        $cadena2 .= ' <li class="active">
									<a data-target="#pic-' . $contador . '" data-toggle="tab">
										<img img src="images/cepas/' . $row["nombre"] . '" width="122" height="122 " />
									</a>
								</li>';
        $bandera = false;
      } else {
        $cadena2 .= '<li><a data-target="#pic-' . $contador . '" data-toggle="tab"><img src="images/cepas/' . $row["nombre"] . '" width="122" height="122" /></a>
								</li>';
      }
      $contador++;
    }
  } else {
    echo "No hay imagenes";
  }
  $cadena1 .= '</div>';
  $cadena2 .= '</ul>';
  return $cadena1 . $cadena2;

  desconectar_bd($con);
}
function agregarCategoria($categoria, $nombre_foto, $archivo, $target_file, $descripcion)
{
  $con = new mysqli("mysql1008.mochahost.com", "dawbdorg_1704641", "1704641", "dawbdorg_A01704641");
  if ($con->connect_errno) {
    printf("Conexión fallida: %s\n", $con->connect_error);
    exit();
  }
  try {
    $con->autocommit(false);
    $con->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    echo "entra al try<br>";
    if (!($con->query("INSERT INTO categoria (nombre,nombre_foto,descripcion) VALUES ('$categoria' ,'$nombre_foto' ,'$descripcion')"))) {
      throw new Exception("No se pudo insertar la categoria");
    }



    if (move_uploaded_file($archivo["upload"]["tmp_name"], $target_file)) {
      echo "The file " . basename($archivo["upload"]["name"]) . " has been uploaded.";
    } else {
      throw new Exception("Sorry, there was an error uploading your file.");
    }



    $con->commit() . "<br>";
    $con->autocommit(true) . "<br>";

    $con->close();
    $_SESSION["mensaje"] = true;
    header('location: ./addCategoria.php');
    echo "fin commit<br>";
  } catch (Exception $e) {
    $con->rollback();
    $_SESSION["mensaje"] = false;
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

function getCepaCarrusel()
{
  $contador = 1;
  $active = "active";
  $con = conectar_bd();
  $sql = "SELECT weed.nombre AS weedNombre, weed.id AS weedId, weed.descripcion, categoria.nombre AS catNombre
          FROM weed, categoria
          WHERE weed.id_categoria = categoria.id
          AND estado = 1
          ORDER BY RAND ( ) LIMIT 3";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      if ($contador > 1) {
        $active = "";
      }
      echo '<div class="carousel-item ' . $active . ' slide-' . $contador . '">
        <div class="container">
          <div class="row">
            <div class="col-xl-7">
              <div class="tarjeta">
                <h4><a href="#" title="Híbrida">' . $row["catNombre"] . '</a></h4>
                <h1 class="font-weight-bold">' . $row["weedNombre"] . '</h1>
                <p class="text-black-50">' . cortarDescripcion($row["descripcion"], 550) . '</p>
                <p class="m-0"><a href="single.php?idweed=' . $row["weedId"] . '" title="Ver" class="btn btn-outline-info">Ver</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>';
      $contador++;
    }
  }
  desconectar_bd($con);
}

function getCepasDestacadas()
{

  $con = conectar_bd();
  $sql = "SELECT weed.nombre AS weedNombre, weed.id AS weedId, weed.descripcion, categoria.nombre AS catNombre, categoria.id AS catId
          FROM weed, categoria
          WHERE weed.id_categoria = categoria.id
          AND estado = 1
          ORDER BY RAND ( ) LIMIT 8";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $sql2 = "SELECT fotos.nombre AS fotoNombre FROM fotos, weed WHERE fotos.id_weed = " . $row["weedId"] . " LIMIT 1";
      $result2 = $con->query($sql2);
      if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
          echo '
          <div class="col-md-6 col-lg-3">
              <div class="bg-white shadow text-center pt-2 pt-sm-4 pb-2 pb-sm-4 mb-4">
                  <p><img src="images/cepas/' . $row2["fotoNombre"] . '" alt="Weed" class="img-fluid"></p>
                  <h5 class="m-0"><a href="catalogo.php?idcategoria=' . $row["catId"] . '" title="' . $row["catNombre"] . '">' . $row["catNombre"] . '</a></h5>
                  <h4><a href="single.php?idweed=' . $row['weedId'] . '" title="Lemon Haze" class="text-dark">' . $row["weedNombre"] . '</a></h4>
              </div>
          </div>
          ';
        }
      }
    }
  }
  desconectar_bd($con);
}

function getNombreCategoria($idcategoria)
{
  $con = conectar_bd();
  $sql = "SELECT * FROM categoria WHERE categoria.id = $idcategoria";
  $result = $con->query($sql);
  $categoria = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo
      "<h2>" . $categoria["nombre"] . "</h2>
                <p>" . $categoria["descripcion"] . "</p>";
  }

  desconectar_bd($con);
}

function getListadoTerpenos()
{
  $contador = 0;
  $con = conectar_bd();
  $sql = "SELECT  * from terpenos";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<div class="row">
            <div class="col-md-10">
                <input type="text" class="form-control" name="' . $contador . '"  value="' . $row["nombre"] . '">
               <input type="hidden" class="form-control" name="id' . $contador . '"  value="' . $row["id_terpeno"] . '">
            </div>
            <div class="col-md-2">
            <a class=" btn btn-danger btn-sm" href="controlador_eliminarTerpenos.php?id_terpeno=' . $row["id_terpeno"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')"><i class="fa fa-trash" ></i></a>
            </div>
        </div>
      ';
      $contador++;
    }
  } else {
    echo '0 results';
  }
  desconectar_bd($con);
}

function editarTerpenos($nombre, $id)
{
  $dml = "UPDATE terpenos
SET nombre = '$nombre'
WHERE id_terpeno = $id;";
  return modifyDb($dml);
}
function eliminarTerpeno($id)
{
  $dml = "delete from terpenos WHERE id_terpeno = $id;";
  return modifyDb($dml);
}

function getListadoCategorias()
{
  $contador = 0;
  $con = conectar_bd();
  $sql = "SELECT  * from categoria";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<div class="row">
            <div class="col-md-2">
                <input type="text" class="form-control" name="' . $contador . '"  value="' . $row["nombre"] . '">
               <input type="hidden" class="form-control" name="id' . $contador . '"  value="' . $row["id"] . '">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="descripcion' . $contador . '"  value="' . $row["descripcion"] . '">
               
            </div>
            <div class="col-md-2">
                <img src="images/categoria/' . $row["nombre_foto"] . '" width="100px">
               
            </div>
            <div class="col-md-2">
            <a class=" btn btn-primary btn-sm" href="vista_editarImagenCategoria.php?id_categoria=' . $row["id"] . '">Editar Imagen</a>
            
            <a class=" btn btn-danger btn-sm" href="controlador_editarCategoria.php?id_categoria=' . $row["id"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')"><i class="fa fa-trash" ></i></a>
            </div>
        </div>
      ';
      $contador++;
    }
  } else {
    echo '0 results';
  }
  desconectar_bd($con);
}
function editarCategoria($id, $nombre, $descripcion)
{
  $dml = "UPDATE categoria
SET nombre='$nombre',descripcion='$descripcion'
WHERE id = $id;";
  return modifyDb($dml);
}

function eliminarCategoria($id)
{
  $dml = "delete from categoria WHERE id = $id;";
  return modifyDb($dml);
}

function crear_selectEdit($id, $columna_descripcion, $tabla, $categoria, $categoriaId)
{
  $conion_bd = conectar_bd();


  $resultado = '<select class="form-control" name="' . $tabla . '" id="' . $tabla . '"><option value="' . $categoriaId . '" selected>' . $categoria . '</option>';


  $consulta = "SELECT $id  , $columna_descripcion  FROM $tabla";
  $resultados = $conion_bd->query($consulta);
  while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {

    if ($row["$columna_descripcion"] != $categoria) {
      $resultado .= '<option value="' . $row["$id"] . '">' . $row["$columna_descripcion"] . '</option>';
    }
  }

  desconectar_bd($conion_bd);
  $resultado .=  '</select>';
  return $resultado;
}

function formEditReceta($nombre, $descripcion, $subtitulo, $descripcion2, $categoria, $categoriaId, $idweed)
{
  echo '<form id="addCepa" action="controlador_editReceta.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="usr">Titulo:</label>
            <input type="text" class="form-control " id="name" name="titulo" value="' . $nombre . '" required>
            <input type="hidden" class="form-control " id="idWeed" name="idReceta" value="' . $idweed . '">
        </div>
        <div class="form-group">
            <label for="usr">Descripcion:</label>
            <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" required>' . $descripcion . '</textarea>
        </div>
        <div class="form-group">
            <label for="usr">Subtitulo:</label>
            <input type="text" class="form-control " id="name" name="subtitulo" value="' . $subtitulo . '" required>
            <input type="hidden" class="form-control " id="idWeed" name="idWeed" value="' . $subtitulo . '">
        </div>
        <div class="form-group">
            <label for="usr">Descripcion del subtitulo:</label>
            <textarea type="textarea" class="form-control " id="descripcion2" name="descripcion2" required>' . $descripcion2 . '</textarea>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            ' . crear_selectEdit("id", "nombre", "categoria_recetas", $categoria, $categoriaId) . '
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Archivos</label>
            <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
        </div>
        <input type="submit" value="Actualizar" name="submit">
    </form>';
}

function formEditCepa($nombre, $descripcion, $categoria, $categoriaId, $minCBD, $maxCBD, $maxTHC, $minTHC, $altura, $dificultad, $florecimiento, $rendimiento, $idweed)
{

  echo '<form id="addCepa" action="controlador_editCepa.php" method="POST" enctype="multipart/form-data">
        <div class="form-group ">
            <label for="usr">Nombre:</label>
            <input type="text" class="form-control " id="name" name="name" value="' . $nombre . '" required>
            <input type="hidden" class="form-control " id="idWeed" name="idWeed" value="' . $idweed . '">
        </div>
        <div class="form-group ">
            <label for="usr">Descripcion:</label>
            <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" required>' . $descripcion . '</textarea>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            ' . crear_selectEdit("id", "nombre", "categoria", $categoria, $categoriaId) . '
        </div>
        <div class="form-group">
            <label>Terpenos</label>
            ' . getEditTerpenos($idweed) . '
        </div>
        <div class="input-group">
            <label>CBD</label>
            <p>Mínimo:</p>
            <input type="number" id="cbdmin" name="cbdmin" class="form-control" placeholder="0" min="0" max="100" step="0.01" value="' . $minCBD . '" required>
            <p>Máximo:</p>
            <input type="number" id="cbdmax" name="cbdmax" class="form-control" placeholder="10" min="0" max="100" step="0.01" value="' . $maxCBD . '">
        </div>
        <div class="input-group">
            <label>THC</label>
            <p>Mínimo:</p>
            <input type="number" id="thcmin" name="thcmin" class="form-control" placeholder="0" min="0" max="100" step="0.01" value="' . $minTHC . '" required>
            <p>Máximo:</p>
            <input type="number" id="thcmax" name="thcmax" class="form-control" placeholder="10" min="0" max="100" step="0.01" value="' . $maxTHC . '">
        </div>
        <div class="form-group">
            <label>Crecimiento</label>
            <label for="sel1">Dificultad:</label>
            ' . crear_selectDificultad($dificultad) . '
            <label for="sel1">Altura (pulgadas):</label>
            ' . crear_selectAltura($altura) . '
            <label for="sel1">Rendimiento (Oz/Ft)^2:</label>
            ' . crear_selectRendimiento($rendimiento) . '
            <label for="sel1">Florecimiento (En Semanas):</label>
            ' . crear_selectFlorecimiento($florecimiento) . '
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Archivos</label>
            <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
        </div>
        <div class="form-group">
          <div class="main col-md-4">
            <h2>Sensaciones</h2>
            ' . getInputSensaciones($idweed) . '
          </div>
          <div class="col-md-4">
            <h2>Ayuda con</h2>
            ' . getInputAyuda($idweed) . '
          </div>
          <div class="col-md-4">
            <h2>Negativos</h2>
            ' . getInputNegativos($idweed) . '
        </div>
        <input type="submit" value="Actualizar" name="submit">
    </form>';
}

function editarCepa($cbdmin, $cbdmax, $thcmin, $thcmax, $dificultad, $altura, $rendimiento, $florecimiento, $id_categoria, $nombre, $descripcion, $terpenos, $porcentajes, $nombres_arch, $archivos)
{

  if ($cbdmax == "") {
    $cbdmax = 0;
  }
  if ($thcmax == "") {
    $thcmax = 0;
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
    } else {
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
    for ($i = 0; $i < count($nombres_arch); $i++) {
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
      } else {
        throw new Exception("no jala subir fotos");
      }
    }
    echo "bloque fotos<br>";
    echo $con->commit() . "<br>";
    echo $con->autocommit(true) . "<br>";

    $con->close();
    $_SESSION["mensaje"] = true;
    header('location: ./addCepa.php');
    echo "fin commit<br>";
  } catch (Exception $e) {
    $con->rollback();
    $_SESSION["mensaje"] = false;
    //header('location: ./addCepa.php');
    //echo 'Something fails: ',  $e->getMessage(), "\n";
    //echo "errror, falio ferga<br>";
  }
}

function getListadoCepas()
{
  $con = conectar_bd();
  $sql = "SELECT weed.nombre AS weedNombre, categoria.nombre, weed.id AS weedId, (SELECT fotos.nombre FROM fotos WHERE fotos.nombre LIKE '%1%'AND fotos.id_weed = weed.id LIMIT 1) AS foto
          FROM weed, fotos, categoria
          WHERE weed.id = fotos.id_weed
          AND weed.id_categoria = categoria.id
          AND weed.estado > 0
          group by weed.nombre";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      if ($row["foto"] != null) {
        $idweed =  $row["weedId"];
        echo '<tr>
                  <td data-th="Product">
                      <div class="row">
                          <div class="col-sm-6">
                              <h4 class="nomargin">' . $row['weedNombre'] . '</h4>
                          </div>
                          <div class="col-sm-6 hidden-xs">
                            <img src="images/cepas/' . $row["foto"] . '" style="with: 20px;" class="img-responsive" />
                          </div>
                      </div>
                  </td>
                  <td>' . $row['nombre'] . '</td>
                  <td class="actions" data-th="">
                  <form id="' . $row["weedId"] . '" action="editCepa.php" method="get" style="display: inline-block">
                  <input type="hidden" name="idweed" value="' . $row["weedId"] . '">
                        <a href="javascript:{}" onclick="document.getElementById(' . "'$idweed'" . ').submit();" class="icon">
                          <button class="btn btn-info btn-sm"><i class="fas fa-wrench"></i></button>
                        </a>
                  </form>
                  <a href="borrarCepa.php?idweed=' . $row["weedId"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')" class="icon" style="display: inline-block">
                    <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                  </a>
                </td>
              </tr>';
      } else {
        $sql = "SELECT weed.nombre AS weedNombre, categoria.nombre, weed.id AS weedId, (SELECT fotos.nombre FROM fotos WHERE fotos.id_weed = weed.id LIMIT 1) AS foto
                FROM weed, fotos, categoria
                WHERE weed.id = fotos.id_weed
                AND weed.id_categoria = categoria.id
                AND weed.estado > 0
                group by weed.nombre";
        $result = $con->query($sql);
        $idweed =  $row["weedId"];
        echo '<tr>
                  <td data-th="Product">
                      <div class="row">
                          <div class="col-sm-6">
                              <h4 class="nomargin">' . $row['weedNombre'] . '</h4>
                          </div>
                          <div class="col-sm-6 hidden-xs">
                            <img src="images/cepas/' . $row["foto"] . '" style="with: 20px;" class="img-responsive" />
                          </div>
                      </div>
                  </td>
                  <td>' . $row['nombre'] . '</td>
                  <td class="actions" data-th="">
                  <form id="' . $row["weedId"] . '" action="editCepa.php" method="get" style="display: inline-block">
                  <input type="hidden" name="idweed" value="' . $row["weedId"] . '">
                        <a href="javascript:{}" onclick="document.getElementById(' . "'$idweed'" . ').submit();" class="icon">
                          <button class="btn btn-info btn-sm"><i class="fas fa-wrench"></i></button>
                        </a>
                    </form>
                      <a href="borrarCepa.php?idweed=' . $row["weedId"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')" class="icon" style="display: inline-block">
                        <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </a>
                  </td>
              </tr>';
      }
    }
  }
  desconectar_bd($con);
}

function getListadoRecetas()
{
  $con = conectar_bd();
  $sql = "SELECT recetas.titulo, categoria_recetas.nombre, recetas.id AS recetaId, (SELECT fotos_recetas.nombre FROM fotos_recetas WHERE fotos_recetas.nombre LIKE '%1%'AND fotos_recetas.id_receta = recetas.id LIMIT 1) AS foto
          FROM recetas, fotos_recetas, categoria_recetas
          WHERE recetas.id = fotos_recetas.id_receta
          AND categoria_recetas.id = recetas.id_categoria_receta
          AND recetas.estado > 0
          group by recetas.titulo";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      if ($row["foto"] != null) {
        $idweed =  $row["recetaId"];
        echo '<tr>
                  <td data-th="Product">
                      <div class="row">
                          <div class="col-sm-6">
                              <h4 class="nomargin">' . $row['titulo'] . '</h4>
                          </div>
                          <div class="col-sm-6 hidden-xs">
                            <img src="images/recetas/' . $row["foto"] . '" style="with: 20px;" class="img-responsive" />
                          </div>
                      </div>
                  </td>
                  <td>' . $row['nombre'] . '</td>
                  <td class="actions" data-th="">
                  <form id="' . $row["recetaId"] . '" action="edit_receta.php" method="get" style="display: inline-block">
                  <input type="hidden" name="idreceta" value="' . $row["recetaId"] . '">
                        <a href="javascript:{}" onclick="document.getElementById(' . "'$idweed'" . ').submit();" class="icon">
                          <button class="btn btn-info btn-sm"><i class="fas fa-wrench"></i></button>
                        </a>
                  </form>
                  <a href="borrarReceta.php?idreceta=' . $row["recetaId"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')" class="icon" style="display: inline-block">
                    <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                  </a>
                </td>
              </tr>';
      } else {
        $sql = "SELECT recetas.titulo, categoria_recetas.nombre, recetas.id AS recetaId, (SELECT fotos_recetas.nombre FROM fotos_recetas WHERE fotos_recetas.id_receta = recetas.id LIMIT 1) AS foto
                FROM recetas, fotos_recetas, categoria_recetas
                WHERE recetas.id = fotos_recetas.id_receta
                AND categoria_recetas.id = recetas.id_categoria_receta
                AND recetas.estado > 0
                group by recetas.titulo";
        $result = $con->query($sql);
        $idweed =  $row["recetaId"];
        echo '<tr>
                  <td data-th="Product">
                      <div class="row">
                          <div class="col-sm-6">
                              <h4 class="nomargin">' . $row['titulo'] . '</h4>
                          </div>
                          <div class="col-sm-6 hidden-xs">
                            <img src="images/recetas/' . $row["foto"] . '" style="with: 20px;" class="img-responsive" />
                          </div>
                      </div>
                  </td>
                  <td>' . $row['nombre'] . '</td>
                  <td class="actions" data-th="">
                  <form id="' . $row["recetaId"] . '" action="edit_receta.php" method="get" style="display: inline-block">
                  <input type="hidden" name="idreceta" value="' . $row["recetaId"] . '">
                        <a href="javascript:{}" onclick="document.getElementById(' . "'$idweed'" . ').submit();" class="icon">
                          <button class="btn btn-info btn-sm"><i class="fas fa-wrench"></i></button>
                        </a>
                    </form>
                      <a href="borrarReceta.php?idreceta=' . $row["recetaId"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')" class="icon" style="display: inline-block">
                        <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </a>
                  </td>
              </tr>';
      }
    }
  }
  desconectar_bd($con);
}

function crear_selectDificultad($dificultad)
{

  if ($dificultad == "facil") {

    $resultado = '<select class="form-control" id="dificultad" name="dificultad" required>
        <option value="facil" selected>Facil</option>
        <option value="moderado">Moderado</option>
        <option value="dificil">Dificil</option>
      </select>';
  }

  if ($dificultad == "moderado") {

    $resultado = '<select class="form-control" id="dificultad" name="dificultad" required>
        <option value="facil" >Facil</option>
        <option value="moderado" selected>Moderado</option>
        <option value="dificil">Dificil</option>
      </select>';
  }
  if ($dificultad == "dificil") {
    $resultado = '<select class="form-control" id="dificultad" name="dificultad" required>
        <option value="facil" >Facil</option>
        <option value="moderado">Moderado</option>
        <option value="dificil" selected>Dificil</option>
      </select>';
  }


  return $resultado;
}

function crear_selectAltura($altura)
{

  if ($altura == "< 30") {

    $resultado = '<select class="form-control" id="altura" name="altura" required>
                    <option value="< 30" selected>< 30</option>
                    <option value="30 - 78">30 - 78</option>
                    <option value="> 78">> 78</option>
                  </select>';
  }

  if ($altura == "30 - 78") {

    $resultado = '<select class="form-control" id="altura" name="altura" required>
                    <option value="< 30">< 30</option>
                    <option value="30 - 78" selected>30 - 78</option>
                    <option value="> 78">> 78</option>
                  </select>';
  }
  if ($altura == "> 78") {
    $resultado = '<select class="form-control" id="altura" name="altura" required>
                    <option value="< 30">< 30</option>
                    <option value="30 - 78">30 - 78</option>
                    <option value="> 78" selected>> 78</option>
                  </select>';
  }


  return $resultado;
}

function crear_selectRendimiento($rendimiento)
{

  if ($rendimiento == "0.5 - 1") {

    $resultado = '<select class="form-control" id="rendimiento" name="rendimiento" required>
                  <option value="0.5 - 1" selected>0.5 - 1</option>
                  <option value="1 - 3">1 - 3</option>
                  <option value="3 - 6">3 - 6</option>
                </select>';
  }

  if ($rendimiento == "1 - 3") {

    $resultado = '<select class="form-control" id="rendimiento" name="rendimiento" required>
                  <option value="0.5 - 1">0.5 - 1</option>
                  <option value="1 - 3" selected>1 - 3</option>
                  <option value="3 - 6">3 - 6</option>
                </select>';
  }
  if ($rendimiento == "3 - 6") {
    $resultado =
      '<select class="form-control" id="rendimiento" name="rendimiento" required>
                  <option value="0.5 - 1">0.5 - 1</option>
                  <option value="1 - 3">1 - 3</option>
                  <option value="3 - 6" selected>3 - 6</option>
                </select>';
  }


  return $resultado;
}

function crear_selectFlorecimiento($florecimiento)
{
  if ($florecimiento == "7 - 9") {

    $resultado = '<select class="form-control" id="florecimiento" name="florecimiento" required>
                  <option value="7 - 9" selected>7 - 9</option>
                  <option value="10 - 12">10 - 12</option>
                  <option value="> 12">> 12</option>
              </select>';
  }

  if ($florecimiento == "10 - 12") {

    $resultado = '<select class="form-control" id="florecimiento" name="florecimiento" required>
                    <option value="7 - 9">7 - 9</option>
                    <option value="10 - 12" selected>10 - 12</option>
                    <option value="> 12">> 12</option>
                </select>';
  }
  if ($florecimiento == "> 12") {
    $resultado = '<select class="form-control" id="florecimiento" name="florecimiento" required>
                    <option value="7 - 9">7 - 9</option>
                    <option value="10 - 12">10 - 12</option>
                    <option value="> 12" selected>> 12</option>
                </select>';
  }


  return $resultado;
}

function getEditTerpenos($idweed)
{
  $conion_bd = conectar_bd();


  $resultado = '';

  $bandera = 0;
  $consulta2 = "SELECT id_terpeno, nombre FROM terpenos";
  $resultados2 = $conion_bd->query($consulta2);
  while ($row2 = mysqli_fetch_array($resultados2, MYSQLI_BOTH)) {

    $consulta = "SELECT weed_terpenos.id_terpeno,weed_terpenos.porcentaje,terpenos.nombre
              FROM weed_terpenos,terpenos 
              WHERE id_weed =$idweed AND weed_terpenos.id_terpeno=terpenos.id_terpeno;";
    $resultados = $conion_bd->query($consulta);
    while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {

      if ($row2["id_terpeno"] == $row["id_terpeno"]) {

        $resultado .= '<div class="checkbox" id="checkterpenos">
          <label>
            <input class="terpenos" type="checkbox" name="terpenos[]" idt="' . $row["id_terpeno"] . '"  value="' . $row["id_terpeno"] . '" checked>' . $row["nombre"] . '
          </label>
          <input type="number" name="porcentajes[]" class="form-control" id="' . $row["id_terpeno"] . '" value="' . $row["porcentaje"] . '" placeholder="5" min="1" max="100">
        </div>';
        $bandera = 1;
      }
    }
    if ($bandera == 0) {
      $resultado .= '<div class="checkbox" id="checkterpenos">
          <label>
            <input class="terpenos" type="checkbox" name="terpenos[]" idt="' . $row2["id_terpeno"] . '"  value="' . $row2["id_terpeno"] . '">' . $row2["nombre"] . '
          </label>
          <input type="number" name="porcentajes[]" class="form-control" id="' . $row2["id_terpeno"] . '" placeholder="5" min="1" max="100">
        </div>';
    }
    $bandera = 0;
  }

  desconectar_bd($conion_bd);
  return $resultado;
}

function ActualizarCepa($nombre, $idweed, $descripcion, $id_categoria, $cbdmin, $cbdmax, $thcmin, $thcmax, $dificultad, $altura, $florecimiento, $rendimiento, $terpenos, $porcentajes, $nombres_arch, $felling_nombres, $felling_porcentajes, $ayuda_nombres, $ayuda_porcentajes, $negativo_nombres, $negativo_porcentajes, $felling_ids, $ayuda_ids, $negativo_ids)
{
  $con = conectar_bd();
  $auxiliar = 0;
  $dml = "UPDATE weed
  SET nombre = '$nombre', descripcion = '$descripcion', id_categoria = '$id_categoria'
  WHERE id = $idweed;";
  modifyDb($dml);

  $crecimiento = "SELECT id_crecimiento FROM weed WHERE id = $idweed";
  $result = $con->query($crecimiento);
  $id_crecimiento = mysqli_fetch_assoc($result);

  $id_crecimiento = $id_crecimiento["id_crecimiento"];

  $dml = "UPDATE crecimiento
  SET dificultad = '$dificultad', altura = '$altura', rendimiento = '$rendimiento', florecimiento = '$florecimiento'
  WHERE id_crecimiento = $id_crecimiento;";
  modifyDb($dml);

  $cbd = "SELECT id_cbd FROM weed WHERE id = $idweed";
  $result = $con->query($cbd);
  $id_cbd = mysqli_fetch_assoc($result);

  $id_cbd = $id_cbd["id_cbd"];

  $dml = "UPDATE cbd
  SET min = $cbdmin, max = $cbdmax
  WHERE id_cbd = $id_cbd;";
  modifyDb($dml);

  $thc = "SELECT id_thc FROM weed WHERE id = $idweed";
  $result = $con->query($thc);
  $id_thc = mysqli_fetch_assoc($result);

  $id_thc = $id_thc["id_thc"];

  $dml = "UPDATE thc
  SET min = $thcmin, max = $thcmax
  WHERE id_thc = $id_cbd;";
  modifyDb($dml);

  $dml = "DELETE FROM weed_terpenos
          WHERE id_weed = $idweed";

  //////////////////////////////////// VERIFICAR IF

  if (modifyDb($dml) != 0) {

    $count = count($porcentajes);
    for ($i = 0; $i < $count; $i++) {

      if ($porcentajes[$i] != '') {
        $terpenos[$auxiliar];
        $porcentajes[$i];
        $dml = "INSERT INTO weed_terpenos (id_weed, id_terpeno, porcentaje) VALUES (?, ?, ?);";
        insertIntoDb($dml, $idweed, $terpenos[$auxiliar], $porcentajes[$i]);
        $auxiliar++;
      }
    }
  }

  for ($i = 0; $i < count($nombres_arch); $i++) {

    $dml = "INSERT INTO fotos (id_weed, nombre) VALUES (?, ?);";
    insertIntoDb($dml, $idweed, $nombres_arch[$i]);
  }

  for ($i = 0; $i < count($felling_nombres); $i++) {
    if (!($con->query("UPDATE efectos SET nombre = '$felling_nombres[$i]', porcentaje = $felling_porcentajes[$i] WHERE id_weed = $idweed AND tipo = 1 AND id_efectos=$felling_ids[$i]"))) {
      throw new Exception("no jala efectos sensaciones");
    }
  }
  for ($i = 0; $i < count($ayuda_nombres); $i++) {
    if (!($con->query("UPDATE efectos SET nombre = '$ayuda_nombres[$i]', porcentaje = $ayuda_porcentajes[$i] WHERE id_weed = $idweed AND tipo = 2 AND id_efectos=$ayuda_ids[$i]"))) {
      throw new Exception("no jala efectos ayuda");
    }
  }
  for ($i = 0; $i < count($negativo_nombres); $i++) {
    if (!($con->query("UPDATE efectos SET nombre = '$negativo_nombres[$i]', porcentaje = $negativo_porcentajes[$i] WHERE id_weed = $idweed AND tipo = 3 AND id_efectos=$negativo_ids[$i]"))) {
      throw new Exception("no jala efectos negativo");
    }
  }
}

function ActualizarReceta($titulo, $subtitulo, $idReceta, $descripcion, $descripcion2, $id_categoria, $nombres_arch)
{
  $dml = "UPDATE recetas
  SET titulo = '$titulo', descripcion = '$descripcion', subtitulo = '$subtitulo', descripcion2 = '$descripcion2', id_categoria_receta = $id_categoria
  WHERE id = $idReceta";
  echo $dml;
  modifyDb($dml);

  $count = count($nombres_arch);
  for ($i = 0; $i < $count; $i++) {

    $dml = "INSERT INTO fotos_recetas (id_receta, nombre) VALUES (?, ?);";
    insertIntoDb($dml, $idReceta, $nombres_arch[$i]);
  }
}

function tablaFotosEditCepa($idweed)
{

  $con = conectar_bd();
  $sql = "SELECT *
          FROM fotos
          WHERE id_weed = $idweed";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      if ($row["nombre"] != null) {
        $idFoto =  $row["id"];

        echo '<table class="table">
          <thead>
              <th>foto</th>
              <th>icono</th>
          </thead>
          <tbody>
              <tr>
                  <td>
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                          <img src="images/cepas/' . $row["nombre"] . '" style="with: 20px;" class="img-responsive" />
                        </div>
                    </div>
                  </td>
                  <td>
                    <form id="' . $row["id"] . '" action="borrarFotos.php" method="post">
                    <input type="hidden" name="idfoto" value="' . $row["id"] . '">
                    <input type="hidden" name="idweed" value="' . $row["id_weed"] . '">
                        <a href="javascript:{}" onclick="document.getElementById(' . "'$idFoto'" . ').submit();" class="icon">
                          <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </a>
                      
                  </form>
                  </td>
              </tr>
          </tbody>
      </table>';
      }
    }
  }
}

function tablaFotosEditReceta($idweed)
{

  $con = conectar_bd();
  $sql = "SELECT *
          FROM fotos_recetas
          WHERE id_receta = $idweed";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

      if ($row["nombre"] != null) {
        $idFoto =  $row["id"];

        echo '<table class="table">
          <thead>
              <th>foto</th>
              <th>icono</th>
          </thead>
          <tbody>
              <tr>
                  <td>
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                          <img src="images/recetas/' . $row["nombre"] . '" style="with: 20px;" class="img-responsive" />
                        </div>
                    </div>
                  </td>
                  <td>
                    <form id="' . $row["id"] . '" action="borrarFotos.php" method="post">
                    <input type="hidden" name="idfoto" value="' . $row["id"] . '">
                    <input type="hidden" name="idweed" value="' . $row["id_receta"] . '">
                        <a href="javascript:{}" onclick="document.getElementById(' . "'$idFoto'" . ').submit();" class="icon">
                          <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </a>
                      
                  </form>
                  </td>
              </tr>
          </tbody>
      </table>';
      }
    }
  }
}

function editarImagenCategoria($categoria, $nombre)
{
  $dml = "UPDATE categoria SET nombre_foto='$nombre' WHERE id=$categoria;";
  modifyDb($dml);
}

function agregarBlog($id_categoria, $titulo, $descripcion,  $nombres_arch, $archivos, $subtitulo, $descripcionsubtitulo)
{
  $con = new mysqli("mysql1008.mochahost.com", "dawbdorg_1704641", "1704641", "dawbdorg_A01704641");
  if ($con->connect_errno) {
    printf("Conexión fallida: %s\n", $con->connect_error);
    exit();
  }


  try {
    $con->autocommit(false);
    $con->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    echo "entra al try<br>";
    if (!($con->query("INSERT INTO blog (titulo,descripcion,fecha,id_categoria_blog,subtitulo,descripcion2, estado) VALUES('$titulo','$descripcion', CURRENT_TIMESTAMP,$id_categoria,'$subtitulo','$descripcionsubtitulo', 1)"))) {
      throw new Exception("error al insertar el blog");
    }

    echo "bloque fotos<br>";
    if (!(mysqli_fetch_assoc($con->query("SELECT id FROM blog ORDER BY id DESC LIMIT 1")))) {
      throw new Exception("error al sacar el select de id blog");
    } else {
      $id_blog = mysqli_fetch_assoc($con->query("SELECT id FROM blog ORDER BY id DESC LIMIT 1"));
      $id_blog = $id_blog["id"];
    }





    echo "bloque de fotos<br>";
    for ($i = 0; $i < count($nombres_arch); $i++) {
      $newFilePath = "images/blog/" . $nombres_arch[$i];
      // Check if file already exists
      if (file_exists($newFilePath)) {
        echo "Sorry, file already exists.";
        throw new Exception("La foto ya existe");
      }
      echo $archivos['upload']['name'][$i];
      if (move_uploaded_file($archivos['upload']['tmp_name'][$i], $newFilePath)) {
        if (!($con->query("INSERT INTO fotos_blog (id_blog,nombre) values ($id_blog, '$nombres_arch[$i]')"))) {
          echo "INSERT INTO fotos_blog (id_blog,nombre) values ($id_blog, '$nombres_arch[$i]')";
          throw new Exception("error al hacer el insert");
        }
      } else {
        throw new Exception("error al cargar las fotos");
      }
    }
    //generar error
    //throw new Exception("error al cargar las fotos");
    echo "bloque fotos<br>";
    echo $con->commit() . "<br>";
    echo $con->autocommit(true) . "<br>";


    $_SESSION["mensaje"] = true;
    header('location: ./agregar_blog.php');
    echo "fin commit<br>";
  } catch (Exception $e) {
    $con->rollback();
    for ($i = 0; $i < count($nombres_arch); $i++) {
      $newFilePath = "images/blog/" . $nombres_arch[$i];
      // Check if file already exists
      if (file_exists($newFilePath)) {
        unlink($newFilePath);
      }
    }
    $_SESSION["mensaje"] = false;
    header('location: ./agregar_blog.php');
    echo 'Something fails: ',  $e->getMessage(), "\n";
    //echo "errror, falio ferga<br>";
  }

  $con->close();
}

function agregarReceta($id_categoria, $titulo, $descripcion,  $nombres_arch, $archivos, $subtitulo, $descripcionsubtitulo, $ingredientes)
{
  $con = new mysqli("mysql1008.mochahost.com", "dawbdorg_1704641", "1704641", "dawbdorg_A01704641");
  if ($con->connect_errno) {
    printf("Conexión fallida: %s\n", $con->connect_error);
    exit();
  }


  try {
    $con->autocommit(false);
    $con->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    echo "entra al try<br>";
    if (!($con->query("INSERT INTO recetas (titulo,descripcion,fecha,id_categoria_receta,subtitulo,descripcion2,ingredientes, estado) VALUES('$titulo','$descripcion', CURRENT_TIMESTAMP,$id_categoria,'$subtitulo','$descripcionsubtitulo','$ingredientes',1)"))) {
      throw new Exception("error al insertar el blog");
    }

    echo "bloque fotos<br>";
    if (!(mysqli_fetch_assoc($con->query("SELECT id FROM recetas ORDER BY id DESC LIMIT 1")))) {
      throw new Exception("error al sacar el select de id blog");
    } else {
      $id_receta = mysqli_fetch_assoc($con->query("SELECT id FROM recetas ORDER BY id DESC LIMIT 1"));
      $id_receta = $id_receta["id"];
    }





    echo "bloque de fotos<br>";
    for ($i = 0; $i < count($nombres_arch); $i++) {
      $newFilePath = "images/recetas/" . $nombres_arch[$i];
      // Check if file already exists
      if (file_exists($newFilePath)) {
        echo "Sorry, file already exists.";
        throw new Exception("La foto ya existe");
      }
      echo $archivos['upload']['name'][$i];
      if (move_uploaded_file($archivos['upload']['tmp_name'][$i], $newFilePath)) {
        if (!($con->query("INSERT INTO fotos_recetas (id_receta,nombre) values ($id_receta, '$nombres_arch[$i]')"))) {
          echo "INSERT INTO fotos_recetas (id_receta,nombre) values ($id_receta, '$nombres_arch[$i]')";
          throw new Exception("error al hacer el insert");
        }
      } else {
        throw new Exception("error al cargar las fotos");
      }
    }
    //generar error
    //throw new Exception("error al cargar las fotos");
    echo "bloque fotos<br>";
    echo $con->commit() . "<br>";
    echo $con->autocommit(true) . "<br>";


    $_SESSION["mensaje"] = true;
    header('location: ./agregar_receta.php');
    echo "fin commit<br>";
  } catch (Exception $e) {
    $con->rollback();
    for ($i = 0; $i < count($nombres_arch); $i++) {
      $newFilePath = "images/recetas/" . $nombres_arch[$i];
      // Check if file already exists
      if (file_exists($newFilePath)) {
        unlink($newFilePath);
      }
    }
    $_SESSION["mensaje"] = false;
    header('location: ./agregar_receta.php');
    echo 'Something fails: ',  $e->getMessage(), "\n";
    //echo "errror, falio ferga<br>";
  }

  $con->close();
}
function getListadoBlog()
{
  $con = conectar_bd();
  $sql = "SELECT blog.titulo AS tituloblog, categoria_blog.nombre, blog.id AS blogId, (SELECT fotos_blog.nombre FROM fotos WHERE  fotos_blog.id_blog = blog.id LIMIT 1) AS foto
          FROM blog, fotos_blog, categoria_blog
          WHERE blog.id = fotos_blog.id_blog
          AND categoria_blog.id = blog.id_categoria_blog
          AND blog.estado > 0
          group by blog.titulo";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $blogId =  $row["blogId"];

      echo '<tr>
                  <td data-th="Product">
                      <div class="row">
                          <div class="col-sm-6">
                              <h4 class="nomargin">' . $row['tituloblog'] . '</h4>
                          </div>
                          <div class="col-sm-6 hidden-xs">
                            <img src="images/cepas/' . $row["foto"] . '" style="with: 20px;" class="img-responsive" />
                          </div>
                      </div>
                  </td>
                  <td>' . $row['nombre'] . '</td>
                  <td class="actions" data-th="">
                  <form id="' . $row["blogId"] . '" action="editBlog.php" method="get" style="display: inline-block">
                  <input type="hidden" name="idblog" value="' . $row["blogId"] . '">
                        <a href="javascript:{}" onclick="document.getElementById(' . "'$blogId'" . ').submit();" class="icon">
                          <button class="btn btn-info btn-sm"><i class="fas fa-wrench"></i></button>
                        </a>
                    </form>
                      <a href="borrarBlog.php?idweed=' . $row["blogId"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')" class="icon" style="display: inline-block">
                        <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </a>
                  </td>
              </tr>';
    }
  }
  desconectar_bd($con);
}
function formEditBlog($idblog, $nombre, $descripcion, $id_categoria_blog, $subtitulo, $descripcion2, $categoria)
{
  echo '<form id="addCepa" action="controlador_editBlog.php" method="POST" enctype="multipart/form-data">
     <div class="form-group">
      <label>Categoria:</label>
       ' . crear_selectCategoria("id", "nombre", "categoria_blog", $categoria, $id_categoria_blog) . '  
    </div>
        <div class="form-group ">
            <label for="usr">Titulo:</label>
            <input type="text" class="form-control " id="titulo" name="titulo" value="' . $nombre . '" required>
            <input type="hidden" class="form-control " id="idBlog" name="idBlog" value="' . $idblog . '">
        </div>
        
    <div class="form-group ">
      <label for="usr">Descripcion:</label>
      <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" required>' . $descripcion . '</textarea>
    </div>
      <div class="form-group ">
      <label for="usr">Subtitulo:</label>
      <input type="text" class="form-control " value="' . $subtitulo . '" id="subtitulo" name="subtitulo" required>
    </div>
    <div class="form-group ">
      <label for="usr">Descripcion del Subtitulo:</label>
      <textarea type="textarea" class="form-control " id="descripcionsubtitulo" name="descripcionsubtitulo"  required>' . $descripcion2 . '</textarea>
    </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Archivos</label>
            <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
        </div>
        <input type="submit" value="Actualizar" name="submit">
    </form>';
}
function crear_selectCategoria($id, $columna_descripcion, $tabla, $categoria, $categoriaId)
{
  $conion_bd = conectar_bd();


  $resultado = '<select class="form-control" name="' . $tabla . '" id="' . $tabla . '"><option value="' . $categoriaId . '" selected>' . $categoria . '</option>';


  $consulta = "SELECT $id  , $columna_descripcion  FROM $tabla";
  $resultados = $conion_bd->query($consulta);
  while ($row = mysqli_fetch_array($resultados, MYSQLI_BOTH)) {

    if ($row["$columna_descripcion"] != $categoria) {
      $resultado .= '<option value="' . $row["$id"] . '">' . $row["$columna_descripcion"] . '</option>';
    }
  }

  desconectar_bd($conion_bd);
  $resultado .=  '</select>';
  return $resultado;
}
function  ActualizarBlog($id_categoria, $titulo, $idBlog, $descripcion, $subtitulo, $descripcionsubtitulo, $nombres_arch)
{
  $con = conectar_bd();
  $auxiliar = 0;
  $dml = "UPDATE blog
SET titulo = '$titulo', descripcion = '$descripcion', id_categoria_blog = '$id_categoria', subtitulo ='$subtitulo'  , descripcion2='$descripcionsubtitulo'
WHERE id = $idBlog;";
  modifyDb($dml);



  //////////////////////////////////// VERIFICAR IF

  $count = count($nombres_arch);
  for ($i = 0; $i < $count; $i++) {

    $dml = "INSERT INTO fotos_blog (id_blog, nombre) VALUES (?, ?);";
    insertIntoDb($dml, $idBlog, $nombres_arch[$i]);
  }
}
function agregarCategoriaBlog($categoria)
{
  $dml = "INSERT INTO categoria_blog (nombre) VALUES ( ?);";
  if (insertIntoDb($dml, $categoria)) {
    $_SESSION["mensaje"] = true;
    header('location: ./agregar_categoria_blog.php');
  } else {
    $_SESSION["mensaje"] = false;
    header('location: ./agregar_categoria_blog.php');
  }
}

function getSensaciones($id_weed)
{

  $conion_bd = conectar_bd();

  $consulta2 = "SELECT nombre, porcentaje FROM efectos WHERE tipo = 1 AND id_weed =$id_weed";
  $resultados2 = $conion_bd->query($consulta2);
  while ($row = mysqli_fetch_array($resultados2, MYSQLI_BOTH)) {
    $porcenaje = $row['porcentaje'];
    $nombre = $row['nombre'];
    echo "
      <h4>$nombre</h4>
      <div class='progress'>
        <div class='progress-bar bg-success' role='progressbar' style='width: $porcenaje%' aria-valuenow='$porcenaje' aria-valuemin='0' aria-valuemax='100'>$porcenaje%</div>
      </div>
    ";
  }
}

function getAyuda($id_weed)
{

  $conion_bd = conectar_bd();

  $consulta2 = "SELECT nombre, porcentaje FROM efectos WHERE tipo = 2 AND id_weed =$id_weed";
  $resultados2 = $conion_bd->query($consulta2);
  while ($row = mysqli_fetch_array($resultados2, MYSQLI_BOTH)) {
    $porcenaje = $row['porcentaje'];
    $nombre = $row['nombre'];
    echo "
      <h4>$nombre </h4>
      <div class='progress'>
        <div class='progress-bar bg-info' role='progressbar' style='width: $porcenaje%' aria-valuenow='$porcenaje' aria-valuemin='0' aria-valuemax='100'>$porcenaje%</div>
      </div>
    ";
  }
}

function getNegativos($id_weed)
{

  $conion_bd = conectar_bd();

  $consulta2 = "SELECT nombre, porcentaje FROM efectos WHERE tipo = 3 AND id_weed =$id_weed";
  $resultados2 = $conion_bd->query($consulta2);
  while ($row = mysqli_fetch_array($resultados2, MYSQLI_BOTH)) {
    $porcenaje = $row['porcentaje'];
    $nombre = $row['nombre'];
    echo "
      <h4>$nombre </h4>
      <div class='progress'>
        <div class='progress-bar bg-warning' role='progressbar' style='width: $porcenaje%' aria-valuenow='$porcenaje' aria-valuemin='0' aria-valuemax='100'>$porcenaje%</div>
      </div>
    ";
  }
}

function getInputSensaciones($idweed)
{
  $conion_bd = conectar_bd();
  $resultado = "";
  $i = 1;
  $consulta2 = "SELECT nombre, porcentaje, id_efectos FROM efectos WHERE tipo = 1 AND id_weed =$idweed";
  $resultados2 = $conion_bd->query($consulta2);
  while ($row = mysqli_fetch_array($resultados2, MYSQLI_BOTH)) {

    $porcenaje = $row['porcentaje'];
    $nombre = $row['nombre'];
    $id_efecto = $row['id_efectos'];
    $resultado .= "
      <div class='col-md-8'>
        <h4>Nombre</h4>
        <input type='text' class='form-control' style='display: inline-block; height: 35px;' name='sn$i' value='$nombre'>
        <input type='hidden' class='form-control' id='idWeed' name='idSensaciones$i' value='$id_efecto'>
      </div>
      <div class='col-md-4'>
        <h4>Porcentaje</h4>
        <input type='number' class='form-control' style='display: inline-block; height: 35px;' name='sp$i' min='0' max='100' value='$porcenaje'>
      </div>
    ";
    $i++;
  }
  return $resultado;
}

function getInputAyuda($idweed)
{
  $conion_bd = conectar_bd();
  $resultado = "";
  $i = 1;
  $consulta2 = "SELECT nombre, porcentaje, id_efectos FROM efectos WHERE tipo = 2 AND id_weed =$idweed";
  $resultados2 = $conion_bd->query($consulta2);
  while ($row = mysqli_fetch_array($resultados2, MYSQLI_BOTH)) {

    $porcenaje = $row['porcentaje'];
    $nombre = $row['nombre'];
    $id_efecto = $row['id_efectos'];
    $resultado .= "
      <div class='col-md-8'>
        <h4>Nombre</h4>
        <input type='text' class='form-control' style='display: inline-block; height: 35px;' name='an$i' value='$nombre'>
        <input type='hidden' class='form-control' id='idWeed' name='idAyuda$i' value='$id_efecto'>
      </div>
      <div class='col-md-4'>
        <h4>Porcentaje</h4>
        <input type='number' class='form-control' style='display: inline-block; height: 35px;' name='ap$i' min='0' max='100' value='$porcenaje'>
      </div>
    ";
    $i++;
  }
  return $resultado;
}

function getInputNegativos($idweed)
{
  $conion_bd = conectar_bd();
  $resultado = "";
  $i = 1;
  $consulta2 = "SELECT nombre, porcentaje, id_efectos FROM efectos WHERE tipo = 3 AND id_weed =$idweed";
  $resultados2 = $conion_bd->query($consulta2);
  while ($row = mysqli_fetch_array($resultados2, MYSQLI_BOTH)) {

    $porcenaje = $row['porcentaje'];
    $nombre = $row['nombre'];
    $id_efecto = $row['id_efectos'];
    $resultado .= "
      <div class='col-md-8'>
        <h4>Nombre</h4>
        <input type='text' class='form-control' style='display: inline-block; height: 35px;' name='nn$i' value='$nombre'>
        <input type='hidden' class='form-control' id='idWeed' name='idNegativo$i' value='$id_efecto'>
      </div>
      <div class='col-md-4'>
        <h4>Porcentaje</h4>
        <input type='number' class='form-control' style='display: inline-block; height: 35px;' name='np$i' min='0' max='100' value='$porcenaje'>
      </div>
    ";
    $i++;
  }
  return $resultado;
}

function countCepas()
{
  $con = conectar_bd();
  $result = mysqli_query($con, "SELECT COUNT(*) AS contador FROM weed WHERE estado = 1");
  $row = mysqli_fetch_assoc($result);
  echo $row['contador'];
}

function getBlogRecientes()
{
  $con = conectar_bd();
  $sql = "SELECT blog.id, blog.fecha, categoria_blog.nombre, blog.titulo, blog.descripcion FROM blog, categoria_blog WHERE blog.id_categoria_blog = categoria_blog.id ORDER BY blog.id DESC LIMIT 3";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $idBlog = $row['id'];
      $sql_imagenes = "SELECT * FROM fotos_blog
            WHERE fotos_blog.id_blog = $idBlog
            LIMIT 1";
      $result_imagenes = $con->query($sql_imagenes);
      $imagen = mysqli_fetch_assoc($result_imagenes);
      if ($result_imagenes->num_rows > 0) {
        $img = $imagen['nombre'];
      }
?>

      <div class="col-xl-4 col-md-6 col-sm-6">
        <article class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/blog/<?= $img; ?>" class="card-img d-none d-sm-block" alt="<?= $row['nombre'] ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h4 class="card-title"><a href="blog/post.php?id=<?= $row['id'] ?>" title="<?= $row['titulo'] ?>" class="stretched-link"><?= $row['titulo'] ?></a></h4>
                <p class="card-text"><?= cortarDescripcion($row['descripcion'], 350) ?></p>
                <p class="card-text"><small class="text-muted"><?= $row['fecha'] ?></small></p>
              </div>
            </div>
          </div>
        </article>
      </div>

    <?php
    }
  }
}

function getRecetasRecientes()
{
  $con = conectar_bd();
  $sql = "SELECT recetas.id, recetas.titulo, recetas.descripcion, recetas.fecha, categoria_recetas.nombre FROM recetas, categoria_recetas WHERE recetas.id_categoria_receta = categoria_recetas.id ORDER BY recetas.id DESC LIMIT 3";
  $result = $con->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $idReceta = $row['id'];
      $sql_imagenes = "SELECT * FROM fotos_recetas
            WHERE fotos_recetas.id_receta = $idReceta
            LIMIT 1";
      $result_imagenes = $con->query($sql_imagenes);
      $imagen = mysqli_fetch_assoc($result_imagenes);
      if ($result_imagenes->num_rows > 0) {
        $img = $imagen['nombre'];
      }
    ?>

      <article class="card">
        <img src="images/recetas/<?= $img; ?>" class="card-img-top" alt="Receta 1">
        <div class="card-body">
          <h4 class="card-title"><a href="recetas/post.php?id=<?= $row['id'] ?>" title="<?= $row['titulo'] ?>" class="stretched-link text-primary"><?= $row['titulo'] ?></a></h4>
          <p class="card-text"><?= cortarDescripcion($row['descripcion'], 350) ?></p>
          <p class="card-text"><small class="text-muted">Tiempo de preparación: <b><?= $row['fecha'] ?></b></small></p>
        </div>
      </article>

<?php
    }
  }
}


function agregarCategoriaReceta($categoria)
{
  $dml = "INSERT INTO categoria_recetas (nombre) VALUES (?);";
  if (insertIntoDb($dml, $categoria)) {
    $_SESSION["mensaje"] = true;
    header('location: ./agregar_categoria_receta.php');
  } else {
    $_SESSION["mensaje"] = false;
    header('location: ./agregar_categoria_receta.php');
  }
}
function getListadoCategoriasRecetas()
{
  $con = conectar_bd();
  $sql = "SELECT  * from categoria_recetas";
  $result = $con->query($sql);
  $contador = 0;
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<div class="row">

            <div class="col-md-2">
                <input type="text" class="form-control" name="' . $contador . '"  value="' . $row["nombre"] . '">
               <input type="hidden" class="form-control" name="id' . $contador . '"  value="' . $row["id"] . '">
            </div>
            
            <div class="col-md-2">
            <a class=" btn btn-danger btn-sm" href="controlador_editarCategoriaRecetas.php?id_categoria=' . $row["id"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')"><i class="fa fa-trash" ></i></a>
            </div>
        </div>
      ';
      $contador = $contador++;
    }
  } else {
    echo '0 results';
  }
  desconectar_bd($con);
}
function editarCategoriaRecetas($id, $nombre)
{
  $dml = "UPDATE categoria_recetas
SET nombre='$nombre'
WHERE id = $id;";
  return modifyDb($dml);
}
function eliminarCategoriaRecetas($id)
{
  $dml = "delete from categoria_recetas WHERE id = $id;";
  return modifyDb($dml);
}
function getListadoCategoriasBlog()
{
  $con = conectar_bd();
  $sql = "SELECT  * from categoria_blog";
  $result = $con->query($sql);
  $contador = 0;
  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo '<div class="row">

            <div class="col-md-2">
                <input type="text" class="form-control" name="' . $contador . '"  value="' . $row["nombre"] . '">
               <input type="hidden" class="form-control" name="id' . $contador . '"  value="' . $row["id"] . '">
            </div>
            
            <div class="col-md-2">
            <a class=" btn btn-danger btn-sm" href="controlador_editarCategoriaBlog.php?id_categoria=' . $row["id"] . '" onclick="return confirm(' . "'" . "¿estas seguro?" . "'" . ')"><i class="fa fa-trash" ></i></a>
            </div>
        </div>
      ';
      $contador = $contador++;
    }
  } else {
    echo '0 results';
  }
  desconectar_bd($con);
}
function editarCategoriaBlog($id, $nombre)
{
  $dml = "UPDATE categoria_blog
SET nombre='$nombre'
WHERE id = $id;";
  return modifyDb($dml);
}
function eliminarCategoriaBlog($id)
{
  $dml = "delete from categoria_blog WHERE id = $id;";
  return modifyDb($dml);
}

?>