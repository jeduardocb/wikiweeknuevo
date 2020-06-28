function addCepa(){
    alert("asdf");
    $.post("controlador_addCepa.php", {
        nombre = $("#name").val(),
        category = $("#categoria").val(),//te arroga el id de la categoria
        cbdmax = $("#cbdmax").val(),
        cbdmin = $("#cbdmin").val(),
        thcmin = $("#thcmin").val(),
        thcmax = $("#thcmax").val(),
        dificultad = $("#dificultad").val(),
        altura = $("#altura").val(),
        florecimiento = $("#florecimiento").val(),
    }).done(function (data) {
       
    });
}