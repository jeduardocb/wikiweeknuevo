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
                    <div class="product-grid" style="background-image:url(images/product-1.jpg);">
                        <div class="inner">
                            <p>
                                <a href="single.html" class="icon"><i class="icon-eye"></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="single.html">'.$row["nombre"].'</a></h3>
                    </div>
                </div>
            </div>';
		}
	} else {
		echo "0 results";
	}

	desconectar_bd($con);
}

?> 