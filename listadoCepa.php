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

?>

<div class="container">
    <h1>Modificar cepa</h1>
    <table id="cart" class="table table-hover table-condensed table-responsive">
        <thead>
            <tr>
                <th style="width:50%">Cepa</th>
                <th style="width:10%">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="nomargin">Taladro 20 Velocidades Rojo con brocas de repuesto</h4>
                        </div>
                        <div class="col-sm-4 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive" /></div>
                    </div>
                </td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm"><i class="fas fa-wrench"></i></button>
                    <button class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
include("_footer.html");
?>