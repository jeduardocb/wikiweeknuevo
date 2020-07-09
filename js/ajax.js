function addCepa(){
    /*var terpenos = [];
    var porcentajes=[];
    let auxiliar;
    $('#checkterpenos input:checked').each(function() {
        terpenos.push($(this).attr('value'));
        auxiliar=$(this).attr('idt');
        porcentajes.push($('#'+auxiliar).val());
    });

        var archivos_nombre = [];
        var archivos = $('#archivo').prop('files');
        var archivos_file = [];

        for (let index = 0; index < archivos.length; index++) {
            archivos_nombre[index] = archivos[index].name;
            archivos_file[index] = $("#archivo")[0].files[index];
            console.log(archivos_file);
        }*/

        /*var parametros = {
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
            porcentajes,
            ////////// ENVIAR ARCHIVOS///////////////
            "archivos_nombre": archivos_nombre,
            "archivos_file": archivos_file
        };*/
        $.ajax({
            data: new FormData(this), //datos que se envian a traves de ajax
                url:   'controlador_addCepa.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                dataType: 'json',
                contentType: false,
                processData: false,
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
            document.getElementById("mensaje").removeAttribute("hidden");   
            if(parseInt(data)!=0  ){
                if(Number.isNaN(parseInt(data))){
                    document.querySelector('.alert').classList.remove('alert-success');
                    document.querySelector('.alert').classList.add('alert-danger');
                     $("#mensaje").html("Se produjo un error al agregar el Terpeno");
                    return;
                }
                $("#mensaje").html("Se ha insertado exitosamente el Terpeno");
            }else{
                document.querySelector('.alert').classList.remove('alert-success');
                document.querySelector('.alert').classList.add('alert-danger');
                $("#mensaje").html("Se produjo un error al agregar el Terpeno");
            }
            
        });
    }//if

}
function addCategoria(){
    if(confirm("¿Estas seguro de agregar esta nueva Categoria?")){
            $.post("controlador_addCategoria.php", {
            categoria : $("#nuevaCategoria").val(),
        }).done(function (data) {
            document.getElementById("mensaje").removeAttribute("hidden");   
            if(parseInt(data)!=0  ){
                if(Number.isNaN(parseInt(data))){
                    document.querySelector('.alert').classList.remove('alert-success');
                    document.querySelector('.alert').classList.add('alert-danger');
                     $("#mensaje").html("Se produjo un error al agregar la Categoria");
                    return;
                }
                $("#mensaje").html("Se ha insertado exitosamente la Categoria");
            }else{
                document.querySelector('.alert').classList.remove('alert-success');
                document.querySelector('.alert').classList.add('alert-danger');
                $("#mensaje").html("Se produjo un error al agregar la Categoria");
            } 
        });
    }//if

}