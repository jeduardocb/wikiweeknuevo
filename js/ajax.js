function addCepa(){
     
    var terpenos = [];
    $('#checkterpenos input:checked').each(function() {
        terpenos.push($(this).attr('value'));
    });
    if(confirm("¿Estas seguro de agregar esta Cepa?")){
            $.post("controlador_addCepa.php", {
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
            descripcion:$("#descripcion").val()
        }).done(function (data) {
            console.log(data)    
                
        });
    }//if

}