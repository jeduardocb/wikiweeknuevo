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
                }
                $("#mensaje").html("Se ha insertado exitosamente el Terpeno");
            }else{
                document.querySelector('.alert').classList.remove('alert-success');
                document.querySelector('.alert').classList.add('alert-danger');
                $("#mensaje").html("Se produjo un error al agregar el Terpeno");
            }
               
            location.href="addTerpeno.php";  
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