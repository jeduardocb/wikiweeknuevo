function addCepa(){
    var terpenos = [];
    var porcentajes=[];
    let auxiliar;
    $('#checkterpenos input:checked').each(function() {
        terpenos.push($(this).attr('value'));
        auxiliar=$(this).attr('idt');
        porcentajes.push($('#'+auxiliar).val());
    });
        var parametros = {
                "nombre" : $("#name").val(),
            "category" : $("#categoria").val(),//te arroga el id de la categoria
            "cbdmax" : $("#cbdmax").val(),
            "cbdmin" : $("#cbdmin").val(),
            "thcmin" : $("#thcmin").val(),
            "thcmax" : $("#thcmax").val(),
            "dificultad" : $("#dificultad").val(),
            "altura" : $("#altura").val(),
            "rendimiento":$("#rendimiento").val(),
            "florecimiento" : $("#florecimiento").val(),
            "descripcion":$("#descripcion").val(),
            terpenos,
            porcentajes
            
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'controlador_addCepa.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultado").html(response);
                }
        });

}
function addTerpeno(){
    if(confirm("¿Estas seguro de agregar este nuevo Terpeno?")){
            $.post("controlador_addTerpeno.php", {
            terpeno : $("#nuevoTerpeno").val(),
        }).done(function (data) {
            console.log(data)  ;  
        });
    }//if

}function addCategoria(){
    if(confirm("¿Estas seguro de agregar esta nueva Categoria?")){
            $.post("controlador_addCategoria.php", {
            categoria : $("#nuevaCategoria").val(),
        }).done(function (data) {
            console.log(data)  ;  
        });
    }//if

}