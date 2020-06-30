<?php
include("_header.html");
include("_navbar.html");
include_once("util.php");
?>
<div class="container">
    <form>
        <div class="form-group ">
          <label for="usr">Nombre:</label>
          <input type="text" class="form-control " id="name">
        </div>
         <div class="form-group ">
          <label for="usr">Descripcion:</label>
          <input type="text" class="form-control " id="descripcion">
        </div>

        <div class="form-group">
        <h5>Categoria</h5>
        <?= crear_select("id","nombre","categoria") ?>
        </div>

        <div class="form-group">
        <h5>Terpenos</h5>
         <?= getTerpenos() ?>
        </div>
        
        <div class="input-group">
            <h5>CBD</h5>
            <input type="number" id="cbdmin" class="form-control" placeholder="0">
            <input type="number" id="cbdmax" class="form-control" placeholder="10">
        </div>
        
      
        <div class="input-group">
              
            <h5>THC</h5>
            
            <input type="number" id="thcmin" class="form-control" placeholder="0">
            <input type="number" id="thcmax" class="form-control" placeholder="10">
        </div>
        <div class="form-group">
                <h5>Grow info</h5>
              <label for="sel1">Difficulty:</label>
              <select class="form-control" id="dificultad">
                <option value="facil">Facil</option>
                <option value="moderado">Moderado</option>
                <option value="dificil">Dificil</option>
              </select>
            
            <label for="sel1">Altura (pulgadas):</label>
              <select class="form-control" id="altura">
                <option value="< 30">< 30</option>
                <option value="30 - 78">30 - 78</option>
                <option value="> 78">> 78</option>
              </select>
            <label for="sel1">Rendimiento (Oz/Ft)^2:</label>
              <select class="form-control" id="rendimiento">
                <option value="0.5 - 1">0.5 - 1</option>
                <option value="1 - 3">1 - 3</option>
                <option value="3 - 6">3 - 6</option>
              </select>
            <label for="sel1">Florecimiento (En Semanas):</label>
              <select class="form-control" id="florecimiento">
                <option value="7 - 9">7 - 9</option>
                <option value="10 - 12">10 - 12</option>
                <option value="> 12">> 12</option>
              </select>
        </div>
        <button type="button" id="add-cepa" onclick="addCepa;" class="btn btn-primary">ADD</button>

    </form>
</div>

<?php
include("_footer.html");
?>
<script type="text/javascript">
    document.getElementById("add-cepa").onclick=addCepa;
   /* window.onload = function(){
document.getElementById("add-cepa").onclick= function() {
    alert("asdf");
    addCepa();
    
};
    }*/
</script>