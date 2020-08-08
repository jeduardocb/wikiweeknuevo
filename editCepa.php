<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
session_start();

if (isset($_SESSION["mensaje"])) {
    if ($_SESSION["mensaje"] == true) {
        echo '<div class="alert alert-success text-center">
                <strong>La Cepa se ha subido correctamente</strong> 
              </div>';
    } else {
        echo '<div class="alert alert-danger text-center">
                <strong>Hubo un error al subir la Cepa</strong> 
            </div>';
    }
    $_SESSION["mensaje"] = null;
}

if (isset($_GET["idweed"])) {
    $idweed = $_GET["idweed"];
    $con = conectar_bd();
    $sql = "SELECT weed.id AS idweed, weed.nombre, weed.descripcion, categoria.nombre AS catNom, categoria.id AS catId,  weed.id_cbd, cbd.min AS minCbd, cbd.max AS maxCbd, thc.max AS maxThc, thc.min AS minThc, crecimiento.altura, crecimiento.dificultad, crecimiento.florecimiento, crecimiento.rendimiento
            FROM weed, categoria, cbd, thc, crecimiento
            WHERE weed.id_categoria = categoria.id
            AND weed.id_cbd = cbd.id_cbd
            AND weed.id_thc = thc.id_thc
            AND weed.id_crecimiento = crecimiento.id_crecimiento
            AND weed.id=$idweed";
    $result = $con->query($sql);
    $datos = mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
        $idweed = $datos["idweed"];
        $nombre = $datos["nombre"];
        $descripcion = $datos["descripcion"];
        $categoria = $datos["catNom"];
        $categoriaId = $datos["catId"];
        $minCBD = $datos["minCbd"];
        $maxCBD = $datos["maxCbd"];
        $minTHC = $datos["minThc"];
        $maxTHC = $datos["maxThc"];
        $altura = $datos["altura"];
        $dificultad = $datos["dificultad"];
        $florecimiento = $datos["florecimiento"];
        $rendimiento = $datos["rendimiento"];
    }
}

?>
<div class="container">
    <?= formEditReceta($nombre, $descripcion, $categoria, $categoriaId, $minCBD, $maxCBD, $maxTHC, $minTHC, $altura, $dificultad, $florecimiento, $rendimiento, $idweed);
    tablaFotosEditCepa($idweed); ?>
</div>

<?php
include("_footer.html");
?>
<script>
    function setHeight(fieldId) {
        document.getElementById(fieldId).style.height = document.getElementById(fieldId).scrollHeight + 'px';
    }
    setHeight('descripcion');

    function terpenos() {
        let coleccionTerpenos = document.getElementsByClassName("terpenos");
        let contador = 0;
        for (let i = 0; i < coleccionTerpenos.length; i++) {
            console.log(coleccionTerpenos[i]);
            let aux = coleccionTerpenos[i].getAttribute("idt");

            if (coleccionTerpenos[i].checked) {
                console.log(aux);
                $("#" + aux).prop("disabled", false);
                //coleccionTerpenos[i].disabled = false;
                $("#" + aux).prop("required", true);
                contador++;
            } else {
                $("#" + aux).prop("disabled", true);
                //coleccionTerpenos[i].disabled = true;
                $("#" + aux).prop("required", false);
            }
        }
    }

    let x = document.getElementsByClassName("terpenos");
    terpenos();
    for (var i = 0; i < x.length; i++) {
        x[i].addEventListener('click', terpenos);
    }
</script>