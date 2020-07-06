function addCepa(){
     
    ////////////////////TERPENOS////////////////////
    var terpenos = [];
    var porcentajes=[];
    let auxiliar;
    $('#checkterpenos input:checked').each(function() {
        terpenos.push($(this).attr('value'));
        auxiliar=$(this).attr('idt');
        porcentajes.push($('#'+auxiliar).val());
    });
    ////////////////////ARCHIVOS////////////////////
    var archivos_nombre = [];
    var archivos = $('#archivo').prop('files');
    var archivos_file = [];

    for (let index = 0; index < archivos.length; index++) {
        archivos_nombre[index] = archivos[index].name;
        archivos_file[index] = $("#archivo")[0].files[index];
        console.log(archivos_file);
    }


    if(confirm("¿Estas seguro de agregar esta Cepa?")){
        $.post("controlador_addCepa.php", processData = false, {
            nombre : $("#name").val(),
            category : $("#categoria").val(),//te arroga el id de la categoria
            cbdmax : $("#cbdmax").val(),
            cbdmin : $("#cbdmin").val(),
            thcmin : $("#thcmin").val(),
            thcmax : $("#thcmax").val(),
            dificultad : $("#dificultad").val(),
            altura : $("#altura").val(),
            rendimiento:$("#rendimiento").val(),
            florecimiento : $("#florecimiento").val(),
            terpenos,
            descripcion:$("#descripcion").val(),
            porcentajes,
            ////////// ENVIAR ARCHIVOS///////////////
            archivos_nombre,
            archivos_file
        }).done(function (data) {
            console.log(data)    
                
        });
    }//if

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