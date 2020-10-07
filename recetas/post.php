<?php
include('header.html');
include('nav.html');
include('util.php');

$idRecetas = $_GET['id'];

function getTitulo($idRecetas)
{
  $con = conectar_bd();

  $sql = "SELECT titulo FROM recetas WHERE id=$idRecetas";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['titulo'];
  }

  desconectar_bd($con);
}

function getDescripcion($idRecetas)
{
  $con = conectar_bd();

  $sql = "SELECT descripcion FROM recetas WHERE id=$idRecetas";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['descripcion'];
  }

  desconectar_bd($con);
}

function getDescripcion2($idRecetas)
{
  $con = conectar_bd();

  $sql = "SELECT descripcion2 FROM recetas WHERE id=$idRecetas";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['descripcion2'];
  }

  desconectar_bd($con);
}

function getImagen($idRecetas)
{
  $con = conectar_bd();

  $sql = "SELECT fotos_recetas.nombre FROM fotos_recetas
    WHERE fotos_recetas.id_receta = $idRecetas
    LIMIT 1";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['nombre'];
  }

  desconectar_bd($con);
}

function getImagen2($idRecetas)
{
  $con = conectar_bd();

  $sql = "SELECT * FROM fotos_recetas
  WHERE fotos_recetas.id_receta = $idRecetas
  ORDER BY id LIMIT 1 OFFSET 1";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['nombre'];
  }

  desconectar_bd($con);
}

function getSubtitulo($idRecetas)
{
  $con = conectar_bd();

  $sql = "SELECT subtitulo FROM recetas WHERE id=$idRecetas";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['subtitulo'];
  }

  desconectar_bd($con);
}
function getCategoria($idRecetas){
 $con = conectar_bd();

  $sql = "SELECT categoria_recetas.nombre FROM categoria_recetas INNER JOIN recetas ON categoria_recetas.id = recetas.id_categoria_receta WHERE recetas.id =$idRecetas";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['nombre'];
  }

  desconectar_bd($con);
}

function getTiempo($idRecetas){
    $con = conectar_bd();

  $sql = "SELECT tiempo_preparacion FROM recetas WHERE id =$idRecetas";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['tiempo_preparacion'];
  }

  desconectar_bd($con);
}

function getIngredientes($idRecetas){
    $con = conectar_bd();

  $sql = "SELECT ingredientes FROM recetas WHERE id =$idRecetas";
  $result = $con->query($sql);
  $titulo = mysqli_fetch_assoc($result);

  if ($result->num_rows > 0) {
    echo $titulo['ingredientes'];
  }

  desconectar_bd($con);
}
?>
<div class="container">
  <div class="row">
    <!-- Latest Posts -->
    <main class="post blog-post col-lg-12">
      <div class="container">
        <div class="post-single">
          <div class="post-thumbnail"><img src="../images/recetas/<?php getImagen($idRecetas);  ?>" alt="<?php getImagen($idRecetas);  ?>" class="img-fluid"></div>
          <div class="post-details">
            <div class="post-meta d-flex justify-content-between">
              <div class="category"><a href="#"> <?php getCategoria($idRecetas); ?>  </a></div>
            </div>
            <h1><?php getTitulo($idRecetas); ?></h1>
            <div class="post-body">
              <p class="lead"><?php getDescripcion($idRecetas);  ?></p>
              <p> <img src="../images/recetas/<?php getImagen2($idRecetas);  ?>" alt="../images/<?php getImagen2($idRecetas);  ?>" class="img-fluid"></p>
              <h3><?php getSubtitulo($idRecetas); ?></h3>
              <p><?php getDescripcion2($idRecetas);  ?></p>
                <h3>Ingredientes</h3>
              <p><?php getIngredientes($idRecetas);  ?></p>
                
                <h3>Tiempo de Preparación</h3>
              <p><?php getTiempo($idRecetas);  ?></p>
            </div>
          
        
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php
include('footer.html');
?>