<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");

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
  <form id="addCepa" action="controlador_addCepa.php" method="POST" enctype="multipart/form-data">
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label for="usr">Nombre:</label>
    </div>
    <div class="form-group">
      <input type="text" class="form-control " id="name" name="name" required>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label for="usr">Descripcion:</label>
    </div>
    <div class="form-group">
      <textarea type="textarea" class="form-control " id="descripcion" name="descripcion" required></textarea>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label>Categoria</label>
    </div>
    <div class="form-group">
      <?= crear_select("id", "nombre", "categoria") ?>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label>Terpenos</label>
    </div>
    <div class="form-group">
      <?= getTerpenos() ?>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label>CBD</label>
    </div>
    <div class="input-group">
      <div class="col-md-12">
        <p>Mínimo: </p>
        <input type="number" id="cbdmin" name="cbdmin" class="form-control" placeholder="0" min="0" max="100" step="0.01" required>
      </div>
      <div class="col-md-12">
        <p>Máximo: </p>
        <input type="number" id="cbdmax" name="cbdmax" class="form-control" placeholder="10" min="0" max="100" step="0.01">
      </div>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label>THC</label>
    </div>
    <div class="input-group">
      <div class="col-md-12">
        <p> Mínimo: </p>
        <input type="number" id="thcmin" name="thcmin" class="form-control" placeholder="0" min="0" max="100" step="0.01" required>
      </div>
      <div class="col-md-12">
        <p> Máximo: </p>
        <input type="number" id="thcmax" name="thcmax" class="form-control" placeholder="10" min="0" max="100" step="0.01">
      </div>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label>Crecimiento</label>
    </div>
    <div class="form-group">
      <label for="sel1">Dificultad:</label>
      <select class="form-control" id="dificultad" name="dificultad" required>
        <option value="facil">Facil</option>
        <option value="moderado">Moderado</option>
        <option value="dificil">Dificil</option>
      </select>
      <label for="sel1">Altura (pulgadas):</label>
      <select class="form-control" id="altura" name="altura" required>
        <option value="< 30">
          < 30</option> <option value="30 - 78">30 - 78
        </option>
        <option value="> 78">> 78</option>
      </select>
      <label for="sel1">Rendimiento (Oz/Ft)^2:</label>
      <select class="form-control" id="rendimiento" name="rendimiento" required>
        <option value="0.5 - 1">0.5 - 1</option>
        <option value="1 - 3">1 - 3</option>
        <option value="3 - 6">3 - 6</option>
      </select>
      <label for="sel1">Florecimiento (En Semanas):</label>
      <select class="form-control" id="florecimiento" name="florecimiento" required>
        <option value="7 - 9">7 - 9</option>
        <option value="10 - 12">10 - 12</option>
        <option value="> 12">> 12</option>
      </select>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <label class="col-sm-2 control-label">Fotografias:</label>
    </div>
    <div class="form-group text-center">
      <input type="file" class="btn btn-outline-info btn-lg rounded-pill" class="form-control" id="upload" name="upload[]" multiple required>
    </div>
    <div class="col-md-12 text-center font-weight-bold">
      <hr>
      <h2>Sensaciones</h2>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <h4>Nombre</h4>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" placeholder="Relajación" name="sn1" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="sn2" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="sn3" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="sn4" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="sn5" id="" required>
        </div>
        <div class="col-md-6">
          <h4>Porcentaje</h4>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="sp1" id="" min="0" placeholder="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="sp2" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="sp3" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="sp4" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="sp5" id="" min="0" max="100" required>
        </div>
      </div>
      <div class="col-md-12 text-center font-weight-bold">
        <hr>
        <h2>Ayuda con</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4>Nombre</h4>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" placeholder="Ansiedad" name="an1" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="an2" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="an3" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="an4" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="an5" id="" required>
        </div>
        <div class="col-md-6">
          <h4>Porcentaje</h4>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="ap1" id="" min="0" placeholder="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="ap2" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="ap3" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="ap4" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="ap5" id="" min="0" max="100" required>
        </div>
      </div>
      <div class="col-md-12 text-center font-weight-bold">
        <hr>
        <h2>Negativos</h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h4>Nombre</h4>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" placeholder="Boca seca" name="nn1" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="nn2" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="nn3" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="nn4" id="" required>
          <input type="text" class="form-control" style="display: inline-block; height: 35px;" name="nn5" id="" required>
        </div>
        <div class="col-md-6">
          <h4>Porcentaje</h4>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="np1" id="" min="0" placeholder="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="np2" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="np3" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="np4" id="" min="0" max="100" required>
          <input type="number" class="form-control" style="display: inline-block; height: 35px;" name="np5" id="" min="0" max="100" required>
        </div>
      </div>
    </div>
    <div class="form-group text-center">
      <input type="submit" class="btn btn-info btn-lg rounded-pill" value="Agregar Cepa" name="submit">
    </div>
  </form>
</div>

<?php
include("_footer.html");
?>
<script>
  function terpenos() {
    let coleccionTerpenos = document.getElementsByClassName("terpenos");
    for (let i = 0; i < coleccionTerpenos.length; i++) {
      console.log(coleccionTerpenos[i]);
      let aux = coleccionTerpenos[i].getAttribute("idt");
      if (coleccionTerpenos[i].checked) {
        console.log(aux);
        $("#" + aux).prop("disabled", false);
        $("#" + aux).prop("required", true);
      } else {
        $("#" + aux).prop("disabled", true);
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