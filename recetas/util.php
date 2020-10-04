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

function getBlogs()
{
    $con = conectar_bd();

    $sql = "SELECT blog.id, blog.titulo, blog.descripcion, blog.fecha, categoria_blog.nombre FROM blog, categoria_blog WHERE blog.id_categoria_blog = categoria_blog.id LIMIT 3";
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
            <div class="row d-flex align-items-stretch" style="margin-bottom: 15px; margin-top: 15px;">
                <div class="text col-lg-7">
                    <div class="text-inner d-flex align-items-center">
                        <div class="content">
                            <header class="post-header">
                                <div class="category"><a href="#"><?= $row['nombre'] ?></a></div><a href="post.php?id=<?= $row['id'] ?>">
                                    <h2 class="h4"><?= $row['titulo'] ?></h2>
                                </a>
                            </header>
                            <p><?= cortarDescripcion($row['descripcion'], 350) ?></p>
                            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>Dante</span></div>
                                </a>
                                <div class="date"><i class="icon-clock"></i><?= $row['fecha'] ?></div>
                                <div class="comments"><i class="icon-comment"></i>12</div>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="image col-lg-5"><img src="../images/blog/<?= $img; ?>" alt="..."></div>
            </div>
        <?php
        }
    }
}

function getRecetas()
{
    $con = conectar_bd();

    $sql = "SELECT recetas.id, recetas.titulo, recetas.descripcion, recetas.fecha, categoria_recetas.nombre 
            FROM recetas, categoria_recetas 
            WHERE recetas.id_categoria_receta = categoria_recetas.id 
            AND recetas.estado <> 0 LIMIT 3";
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
            <div class="row d-flex align-items-stretch" style="margin-bottom: 15px; margin-top: 15px;">
                <div class="text col-lg-7">
                    <div class="text-inner d-flex align-items-center">
                        <div class="content">
                            <header class="post-header">
                                <div class="category"><a href="#"><?= $row['nombre'] ?></a></div><a href="post.php?id=<?= $row['id'] ?>">
                                    <h2 class="h4"><?= $row['titulo'] ?></h2>
                                </a>
                            </header>
                            <p><?= cortarDescripcion($row['descripcion'], 350) ?></p>
                            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>Dante</span></div>
                                </a>
                                <div class="date"><i class="icon-clock"></i><?= $row['fecha'] ?></div>
                                <div class="comments"><i class="icon-comment"></i>12</div>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="image col-lg-5"><img src="../images/recetas/<?= $img; ?>" alt="..."></div>
            </div>
        <?php
        }
    }
}

function getRecetasRecientes()
{
    $con = conectar_bd();
    $sql = "SELECT recetas.id, recetas.titulo, recetas.descripcion, recetas.fecha, categoria_recetas.nombre FROM recetas, categoria_recetas WHERE recetas.id_categoria_receta = categoria_recetas.id AND recetas.estado = 1 ORDER BY recetas.id DESC LIMIT 3";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="post col-md-4">
                <div class="post-thumbnail"><a href="post.html"><img src="img/blog-1.jpg" alt="..." class="img-fluid"></a></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="date"><?= $row['fecha'] ?></div>
                        <div class="category"><a href="#"><?= $row['nombre'] ?></a></div>
                    </div><a href="post.php?id=<?= $row['id'] ?>">
                        <h3 class="h4"><?= $row['titulo'] ?></h3>
                    </a>
                    <p class="text-muted"><?= cortarDescripcion($row['descripcion'], 350) ?></p>
                </div>
            </div>

<?php
        }
    }
}
